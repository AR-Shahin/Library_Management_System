
<?php 
require_once 'header.php'; 
$id = $_SESSION['admin_success_id'];
$sql = "SELECT * FROM libraian WHERE id = $id";
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
<div class="row animated fadeInUp">
    <div class="col-md-6 col-lg-4">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--PROFILE-->
        <div>
            <div class="profile-photo">
                <img alt="User photo" src="../images/libraian/<?= $data['image']?>">
            </div>
            <div class="user-header-info">
                <h2 class="user-name"><?= $data['name']?></h2>
                <h5 class="user-position" ><?= $data['tag']?></h5>
                <div class="user-social-media" style="margin-top: -3px;">
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
                    <li><b><i class="color-primary mr-sm fa fa-globe"></i></b> <?= $data['city'].',Bangladesh'?></li>
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
                            <a href="#">
                                <div class="left-element"><i class="fa fa-check color-success"></i></div>
                                <div class="text">
                                    <span class="title">95 Jobs</span>
                                    <span class="subtitle">Completed</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="left-element"><i class="fa fa-clock-o color-warning"></i></div>
                                <div class="text">
                                    <span class="title">3 Proyects</span>
                                    <span class="subtitle">working on</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="left-element"><i class="fa fa-envelope color-primary"></i></div>
                                <div class="text">
                                    <span class="title">Leave a Menssage</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php' ?>
