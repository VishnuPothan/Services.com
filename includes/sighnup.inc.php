<?php
    if (isset($_POST['sighnup-submit'])){

      require 'dbh.inc.php';
      $fname = $_POST['fname'];
      $sname = $_POST['sname'];
      $username = $_POST['uname'];
      $email = $_POST['mail'];
      $pwd = $_POST['pwd'];
      $pwdConf = $_POST['pwd2'];

      if (empty($fname) || empty($sname) || empty($username) || empty($email) || empty($pwd) || empty($pwdConf)){
            header("location: ../sighnup.php?error=emptyfields&fname=".$fname."&sname=".$sname."&uname=".$username."&mail=".$email);
            exit();
       }
       elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("location: ../sighnup.php?error=invalidmailuid&fname=".$fname."&sname=".$sname);
        exit();
       }
       elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("location: ../sighnup.php?error=invalidmail&fname=".$fname."&sname=".$sname."&uname=".$username);
        exit();
       }
       elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("location: ../sighnup.php?error=emptyfields&fname=".$fname."&sname=".$sname."&mail=".$email);
        exit();
       }
       elseif($pwd !== $pwdConf){
        header("location: ../sighnup.php?error=wrongPasswordConfirm&fname=".$fname."&sname=".$sname."&uname=".$username."&mail=".$email);
        exit();
       }
       else{

        $sql ="SELECT uidUser FROM users WHERE uidUser=$username";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../sighnup.php?error=sqlerrorstmt:".$stmt);
            exit();   

        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck= mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("location: ../sighnup.php?error=usernameAlreadyExist&fname=".$fname."&sname=".$sname."&mail=".$email);
                exit();
            }
            else {
                $sql ="INSERT INTO users (uidUser,emailUser,pwdUser) VALUES($username,$email,$pwd)";
                $stmt = mysqli_stmt_init($conn);
                 if(!mysqli_stmt_prepare($stmt,$sql)){
                         header("location: ../sighnup.php?error=sqlerror");
                         
                         exit();   

                 }
                 else {
                     $hash=password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"sssss",$fname,$sname,$username,$email,$hash);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    header("location: ../sighnup.php?sighnup=success");
                    exit();
                 }

            }
        }
       }
       mysqli_stmt_close($stmt);
       mysqli_close($conn);

    }
    else {
        header("location: ../sighnup.php");
        exit();
    }
    ?>
