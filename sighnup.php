<?php
	require("header.php");
?>

<!--- Sighn up Form -->

  <div class="container">
    <div class="row">
        <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">

                    <!-- form card sighn up -->
                    <div class="card rounded shadow shadow-sm">
                        <div class="card-header">
                            <h3 class="mb-0">Sighn Up</h3>
                        </div>
                        <div class="card-body">
                            <form action="includes/sighnup.inc.php" class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                <div class="form-group">
                                    <label for="name1">First Name</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="fname" id="fname" required="">
                                    <div class="invalid-feedback">Please enter a valid data</div>
                                </div>
                                <div class="form-group">
                                    <label for="name2">Second Name</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="sname" id="sname" required="">
                                    <div class="invalid-feedback">Please enter a valid data</div>
                                </div>
                                <div class="form-group">
                                    <label for="uname">Username</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="uname" id="uname" required="">
                                    <div class="invalid-feedback">Please enter a valid data</div>
                                </div>
                                <div class="form-group">
                                    <label for="mail">Email</label>
                                    <input type="email" class="form-control form-control-lg rounded-0" name="mail" id="mail" required="">
                                    <div class="invalid-feedback">Please enter a valid email address</div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" name="pwd" id="pwd" required="" autocomplete="new-password">
                                    <div class="invalid-feedback">Enter password</div>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" name="pwd2"  id="pwd2" required="" autocomplete="new-password">
                                    <div class="invalid-feedback">Enter password </div>
                                </div>
                                <div class="text-center">
                                        <button type="submit" name="sighnup-submit" class="btn btn-success btn-lg float" id="btnLogin">Sighn Up</button>
                                </div>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->

                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->
</body>
<script>

  $("#btnLogin").click(function(event) {

    //Fetch form to apply custom Bootstrap validation
    var form = $("#formLogin")

    if (form[0].checkValidity() === false) {
      event.preventDefault()
      event.stopPropagation()
    }
    
    form.addClass('was-validated');
  });


</script>