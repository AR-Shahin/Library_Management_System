<?php
session_start();
if(isset($_SESSION['admin_success_id'])){
    header('location:index.php');
}
include('../include/db.php');
if(isset($_POST['btn']))
{
    $username = $_POST['username'];
    $password= $_POST['password'];
    # $password = password_hash($password,PASSWORD_DEFAULT);
    $sql = "SELECT * FROM `libraian` WHERE `username` = '$username' AND `password` = '$password' ";
    $result = mysqli_query($con,$sql);
    $row_count = mysqli_num_rows($result);
    $admin_info = mysqli_fetch_assoc($result);

    if($row_count == 1){

        $_SESSION['admin_success_id'] = $admin_info['id'];
        header('location:index.php');

    }else{
        $input_error = "User name or Password doesnt match!!";
    }
}
?>




<!doctype html>
<html lang="en" class="fixed accounts sign-in">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Student Login page</title>

        <!--BASIC css-->
        <!-- ========================================================= -->
        <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
        <!--SECTION css-->
        <!-- ========================================================= -->
        <!--TEMPLATE css-->
        <!-- ========================================================= -->
        <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <body>
        <div class="wrap">
            <!-- page BODY -->
            <!-- ========================================================= -->
            <div class="page-body animated slideInDown">
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--LOGO-->
                <div class="logo">
                    <h3 class="text-center m-0 p-0">Log In - Libraian</h3>
                    <?php  if(isset($status_not_active)){?>
                    <div class="alert alert-warning alert-dismissible show" role="alert">
                        <b><?= $status_not_active?></b> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php }?>
                    <?php  if(isset($input_error)){?>
                    <div class="alert alert-danger alert-dismissible show" role="alert">
                        <b><?= $input_error ?></b> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php }?>
                </div>
                <div class="box">
                    <!--SIGN IN FORM-->
                    <div class="panel mb-none">
                        <div class="panel-content bg-scale-0">
                            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input type="text" class="form-control"  placeholder="Username " name="username" value="<?= isset($username) ? $username : '' ?>" required>
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <span class="input-with-icon">
                                        <input type="password" class="form-control" placeholder="Password" name="password"> 
                                        <i class="fa fa-key"></i>
                                    </span>
                                </div>
                                <!-- 
<div class="form-group">
<div class="checkbox-custom checkbox-primary">
<input type="checkbox" id="remember-me" value="option1" checked>
<label class="check" for="remember-me">Remember me</label>
</div>
</div>
-->
                                <div class="form-group">
                                    <input type="submit" value="Sign in" class= "btn btn-primary btn-block" name="btn">
                                </div>
                                <div class="form-group text-center">
                                    <a href="pages_forgot-password.html">Forgot password?</a>
                                    <a href="../index.php" class="btn btn-block mt-sm">Back to Home</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            </div>
        </div>
        <!--BASIC scripts-->
        <!-- ========================================================= -->
        <script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
        <!--TEMPLATE scripts-->
        <!-- ========================================================= -->
        <script src="../assets/javascripts/template-script.min.js"></script>
        <script src="../assets/javascripts/template-init.min.js"></script>
        <!-- SECTION script and examples-->
        <!-- ========================================================= -->
    </body>

</html>
