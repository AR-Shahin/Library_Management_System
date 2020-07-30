
<?php 
require_once 'header.php'; 
$id = $_SESSION['user_success_id'];
$sql = "SELECT * FROM students WHERE id = $id";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($result);
?>
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="#">My Profile</a></li>
        </ul>
    </div>
</div>    
<div class="row">
                <div class="col-md-6 col-lg-4" style="box-shadow:2px 3px 8px #ccc">
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--PROFILE-->
                    <div>
                        <div class="profile-photo">
                            <img alt="User photo" src="../images/student/<?= $data['image']?>">
                        </div>
                        <div class="user-header-info">
                            <h2 class="user-name"><?= $data['name']?></h2>
                            <h5 class="user-position">Student</h5>
                            <div class="user-social-media" style="margin-top:-3px">
                                <span class="text-lg"><a href="#" class="fa fa-twitter-square"></a> <a href="#" class="fa fa-facebook-square"></a> <a href="#" class="fa fa-linkedin-square"></a> <a href="#" class="fa fa-google-plus-square"></a></span>
                            </div>
                        </div>
                    </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--CONTACT INFO-->
                    <div class="panel bg-scale-0 b-primary bt-sm mt-xl">
                        <div class="panel-content">
                            <h4 class=""><b>Contact Information</b></h4>
                            <ul class="user-contact-info ph-sm">
                                <li><b><i class="color-primary mr-sm fa fa-envelope"></i></b> <?= $data['email']?></li>
                                <li><b><i class="color-primary mr-sm fa fa-phone"></i></b> <?= $data['phone']?></li>
                                <li><b><i class="color-primary mr-sm fa fa-globe"></i></b> <?= $data['address'] . ',Bangladesh' ?></li>
                                
                            </ul>
                        </div>
                    </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--LIST-->
                    <div class="panel  b-primary bt-sm ">
                        <div class="panel-content">
                            <div class="widget-list list-sm list-left-element ">
                                <ul>
                                    <li>
                                        <table class="table table-striped nowrap table-hover table-bordered">
                                            <tr>
                                                <th><b>Batch</b></th>
                                                <td style="text-align:center"><?= $data['batch']?></td>
                                            </tr>
                                            <tr>
                                                <th><b>ID</b></th>
                                                <td style="text-align:center"><?= $data['uid']?></td>
                                            </tr>
                                            <tr>
                                                <th><b>Result</b></th>
                                                <td style="text-align:center"><?= $data['gpa']?></td>
                                            </tr>
                                            <tr>
                                                <th><b>Blood Group</b></th>
                                                <td style="text-align:center"><?= $data['blood_grp']?></td>
                                            </tr>
                                        </table>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-8">
                    <div class="row">
                        <div class="col-md-6 " style="box-shadow:2px 3px 8px #ccc">
                            <img src="../images/libraian/chat2.png" alt="" style = "width:100%">
                        </div>
                         <div class="col-md-6" style="box-shadow:2px 3px 8px #ccc">
                            <img src="../images/libraian/chat3.png" alt="" style = "width:100%">
                        </div>
                    </div>
                </div>
            </div>
<?php require_once 'footer.php' ?>
