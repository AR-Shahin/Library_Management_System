<?php
include('../include/db.php');

session_start();
if(isset($_SESSION['user_success_id'])){
    header('location:index.php');
}

if(isset($_POST['regBtn'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $batch = $_POST['batch'];
    $uvid = $_POST['uvid'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $conpass = $_POST['conpassword'];
    $image = $_FILES['image']['name'];
    $input_errors = array();

    if(empty($name))
    {
        $input_errors['name'] = "Name field is Required.";
    }
    if(empty($username))
    {
        $input_errors['username'] = "Userame field is Required.";
    }
    if(empty($email))
    {
        $input_errors['email'] = "Email field is Required.";
    }
    if(empty($batch))
    {
        $input_errors['batch'] = "Batch field is Required.";
    }
    if(empty($uvid))
    {
        $input_errors['uvid'] = "ID field is Required.";
    }
    if(empty($phone))
    {
        $input_errors['phone'] = "Phone field is Required.";
    }
    if(empty($address))
    {
        $input_errors['address'] = "Address field is Required.";
    }
    if(empty($password))
    {
        $input_errors['password'] = "Password field is Required.";
    }
    if(empty($conpass))
    {
        $input_errors['conpass'] = "Confirm Password field is Required.";
    }

    if(count($input_errors) == 0)
    {

        $sql = "SELECT * FROM `students` WHERE `username` = '$username'";
        $result = mysqli_query($con,$sql);
        $number_of_username = mysqli_num_rows($result);
        if($number_of_username == 0){
            $sql = "SELECT * FROM `students` WHERE email = '$email'";
            $result = mysqli_query($con,$sql);
            $number_of_email = mysqli_num_rows($result);
            if($number_of_email ==0 )
            {
                if(strlen($password)>=5){
                    if($password == $conpass)
                    {
                        $sql = "SELECT * FROM `students` WHERE uid = '$uvid'";
                        $result = mysqli_query($con,$sql);
                        $number_of_id = mysqli_num_rows($result);
                        if($number_of_id== 0)
                        {
                            #$password = password_hash($password,PASSWORD_DEFAULT);
                            $img_ext =pathinfo($image,PATHINFO_EXTENSION);

                            if($img_ext == 'png' || $img_ext == 'PNG' || $img_ext == 'JPG' || $img_ext == 'jpg'){
                                $image = rand(1,9999) . $username .'.' . $img_ext;
                                $sql = "INSERT INTO `students`(`name`, `username`, `email`, `uid`, `batch`, `pass`, `phone`, `address`, `image`, `status`) VALUES ('$name','$username','$email','$uvid','$batch','$password','$phone','$address','$image',0)";
                                $result = mysqli_query($con,$sql);

                                $img_upload = '../images/student/' . $image;
                                move_uploaded_file($_FILES['image']['tmp_name'], $img_upload);
                                if($result) {
                                    $_SESSION['insert_success'] = 1;
                                }else{
                                    $_SESSION['insert_fail'] = 1;
                                }
                            }
                            else{
                                $img_ext_dont_match= "Image should be PNG or JPEG";
                            }
                        }else{
                               $double_id = "ID is exists!"; 
                        }

                    }else{
                        $password_dont_match = "Password Doesn't match : )";
                    }

                }else{
                    $password_short = "Password is to short! Password more than 6 character";

                }

            }else{
                $doubleemail = "email is exists : )";
            }
        }else{
            $doubleuser = "Username is exists : )";
        }

        /* */
    }

}#isset

?>


<!doctype html>
<html lang="en" class="fixed accounts sign-in">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Student Registration Page</title>

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
                    <h3 class="text-center">Registration</h3>

                    <?php  if(isset($doubleemail)){?>
                    <div class="alert alert-danger alert-dismissible show" role="alert">
                        <b> <?= $doubleemail ?></b>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php }?>
                    <?php  if(isset($doubleuser)){?>
                    <div class="alert alert-danger alert-dismissible show" role="alert">
                        <b><?= $doubleuser ?></b> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php }?>
                    <?php  if(isset($password_dont_match)){?>
                    <div class="alert alert-danger alert-dismissible show" role="alert">
                        <b><?= $password_dont_match ?></b> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php }?>
                    <?php  if(isset($password_short)){?>
                    <div class="alert alert-danger alert-dismissible show" role="alert">
                        <b><?= $password_short ?></b> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php }?>
                    <?php  if(isset($double_id)){?>
                    <div class="alert alert-danger alert-dismissible show" role="alert">
                        <b><?= $double_id ?></b> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php }?>
                    <?php  if(isset($_SESSION['insert_fail'])){?>
                    <div class="alert alert-danger alert-dismissible show" role="alert">
                        <strong>Not Inserted : )</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php }?>
                    <?php  if(isset($_SESSION['insert_success'])){?>
                    <div class="alert alert-success alert-dismissible show" role="alert">
                        <strong>Inserted Successfully!</strong>
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
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group mt-md">
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?= isset($name) ?  $name : '' ?>">
                                    <?php 
    if(isset($input_errors['name'])){ ?>
                                    <span class = "error-text"><?= $input_errors['name'] ?></span>
                                    <?php }?>
                                </div>
                                <div class="form-group mt-md">
                                    <input type="text" class="form-control"  placeholder="User Name" name="username" value="<?= isset($username) ?  $username : '' ?>">
                                    <?php 
    if(isset($input_errors['username'])){ ?>
                                    <span class = "error-text"><?= $input_errors['username'] ?></span>
                                    <?php }?>
                                </div>
                                <div class="form-group mt-md">
                                    <input type="text" class="form-control"  placeholder="Email" name="email" value="<?= isset($email) ?  $email : '' ?>">
                                    <?php 
    if(isset($input_errors['email'])){ ?>
                                    <span class = "error-text"><?= $input_errors['email'] ?></span>
                                    <?php }?>
                                </div>
                                <div class="form-group mt-md">
                                    <input type="text" class="form-control" placeholder="Batch" name="batch" value="<?= isset($batch) ?  $batch : '' ?>">
                                    <?php 
    if(isset($input_errors['batch'])){ ?>
                                    <span class = "error-text"><?= $input_errors['batch'] ?></span>
                                    <?php }?>
                                </div>
                                <div class="form-group mt-md">
                                    <input type="text" class="form-control" placeholder="ID" name="uvid" value="<?= isset($uvid) ?  $uvid : '' ?>">
                                    <?php 
    if(isset($input_errors['uvid'])){ ?>
                                    <span class = "error-text"><?= $input_errors['uvid'] ?></span>
                                    <?php }?>
                                </div>
                                <div class="form-group mt-md">
                                    <input type="text" class="form-control" placeholder="Phone" name="phone" value="<?= isset($phone) ?  $phone : '' ?>">
                                    <?php 
    if(isset($input_errors['phone'])){ ?>
                                    <span class = "error-text"><?= $input_errors['phone'] ?></span>
                                    <?php }?>
                                </div>
                                <div class="form-group mt-md">
                                    <input type="text" class="form-control"  placeholder="Address" name="address" value="<?= isset($address) ?  $address : '' ?>">
                                    <?php 
    if(isset($input_errors['address'])){ ?>
                                    <span class = "error-text"><?= $input_errors['address'] ?></span>
                                    <?php }?>
                                </div>
                                <div class="form-group mt-md">
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-group mt-md">
                                    <input type="password" class="form-control"  placeholder="Password" name="password">
                                    <?php 
                                    if(isset($input_errors['password'])){ ?>
                                    <span class = "error-text"><?= $input_errors['password'] ?></span>
                                    <?php }?>
                                </div>
                                <div class="form-group mt-md">
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="conpassword">
                                    <?php 
                                    if(isset($input_errors['conpass'])){ ?>
                                    <span class = "error-text"><?= $input_errors['conpass'] ?></span>
                                    <?php }?>
                                </div>
                                <div class="form-group">
                                    <input type="submit"class="btn btn-primary btn-block" value="Register" name="regBtn">
                                </div>
                                <!-- 
<div class="form-group">
<div class="checkbox-custom checkbox-primary">
<input type="checkbox" id="terms" value="option1" name="terms">
<label class="check" for="terms">I agree </label>  to the <a href="#">Terms and Conditions</a>
</div>
</div>
-->
                                <div class="form-group text-center">
                                    Have an account? <a href="login.php">Sign In</a>
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
        <style>
            .error-text{
                color:#eb2f06;
                margin: 0;
                font-size: 12px;
                font-weight: 500;

            }
        </style>
    </body>

</html>

<?php

unset($_SESSION['insert_success']);
unset($_SESSION['insert_fail']);
?>
