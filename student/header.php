<?php
include('../include/db.php');
session_start();
if(!isset($_SESSION['user_success_id'])){
    header('location:../404.php');
}

$id = $_SESSION['user_success_id'];
$sql = "SELECT * FROM students WHERE id = $id";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($result);

$page = explode('/', $_SERVER['PHP_SELF']);
$page = end($page);
?>
<!doctype html>
<html lang="en" class="fixed left-sidebar-top">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Student Admin Pannel</title>
        <!--load progress bar-->
        <script src="../assets/vendor/pace/pace.min.js"></script>
        <link href="../assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

        <!--BASIC css-->
        <!-- ========================================================= -->
        <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
        <!--SECTION css-->
        <!-- ========================================================= -->
        <!--Notification msj-->
        <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css">
        <!--Magnific popup-->
        <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css">
        <!--TEMPLATE css-->
        <!-- ========================================================= -->
        <link rel="stylesheet" href="../assets/stylesheets/css/style.css">


    </head>

    <body>
        <div class="wrap">
            <!-- page HEADER -->
            <!-- ========================================================= -->
            <div class="page-header">
                <!-- LEFTSIDE header -->
                <div class="leftside-header">
                    <div class="logo">
                        <a href="index.php" class="on-click">
                            <h3>LMS</h3>
                        </a>
                    </div>
                    <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
                <!-- RIGHTSIDE header -->
                <div class="rightside-header">
                    <div class="header-middle"></div>
                    <!--NOCITE HEADERBOX-->
                    <div class="header-section hidden-xs" id="notice-headerbox">
                        <?php
                        $id = $data['uid'];
                        $sql = "SELECT * FROM `request_book` WHERE `student_id` = '$id' ";
                        $res = mysqli_query($con,$sql);
                        $req_count_book = mysqli_num_rows($res);
                        ?>

                        <!--alerts notices-->
                        <div class="notice" id="alerts-notice">
                            <i class="fa fa-bell-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger"><?=  $req_count_book?></span></i>

                            <div class="dropdown-box basic">
                                <div class="drop-header">
                                    <h3><i class="fa fa-book" aria-hidden="true"></i> Request Books</h3>
                                    <span class="badge x-danger b-rounded"></span>

                                </div>
                                <div class="drop-content">
                                    <div class="widget-list list-left-element list-sm">
                                        <ul>
                                            <?php
    $id = $data['uid'];
                                $sql = "SELECT * FROM `request_book` WHERE `student_id` = '$id' ORDER BY id DESC";
                                $res = mysqli_query($con,$sql);
                                while($req_book = mysqli_fetch_assoc($res)) {?>

                                            <li>
                                            <a href="">
                                                <div class="left-element" style="width:20px"><a href="delete.php?bookid=<?= $req_book['book_id']?>"><i class="fa fa-trash" style="color:red"></i></a></div>
                                                <div class="text">
                                                    <span class="title"><?= $req_book['book_name']?></span>
                                                   
                                                </div>
                                            </a>
                                        </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-separator"></div>
                    </div>
                    <!--USER HEADERBOX -->
                    <div class="header-section" id="user-headerbox">
                        <div class="user-header-wrap">
                            <div class="user-photo">
                                <img alt="profile photo" src="../images/student/<?= $data['image']?>" />
                            </div>
                            <div class="user-info">
                                <span class="user-name"><?=$data['name'] ?></span>
                                <!--   <span class="user-name"><?=$data['name'] ?></span>-->
                                <span class="user-profile">Student</span>
                            </div>
                            <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                            <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                        </div>
                        <div class="user-options dropdown-box">
                            <div class="drop-content basic">
                                <ul>
                                    <li> <a href="pages_user-profile.html"><i class="fa fa-user" aria-hidden="true"></i>User Profile</a></li>
                                    <li> <a href="pages_user-profile.html"><i class="fa fa-user" aria-hidden="true"></i> Update Profile</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="header-separator"></div>
                    <!--Log out -->
                    <div class="header-section">
                        <a href="logout.php" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <!-- page BODY -->
            <!-- ========================================================= -->
            <div class="page-body">
                <!-- LEFT SIDEBAR -->
                <!-- ========================================================= -->
                <div class="left-sidebar">
                    <!-- left sidebar HEADER -->
                    <div class="left-sidebar-header">
                        <div class="left-sidebar-title">Navigation</div>
                        <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                            <span></span>
                        </div>
                    </div>
                    <!-- NAVIGATION -->
                    <!-- ========================================================= -->
                    <div id="left-nav" class="nano">
                        <div class="nano-content">
                            <nav>
                                <ul class="nav nav-left-lines" id="main-nav">
                                    <!--HOME-->
                                    <li class="<?=($page == 'index.php') ? 'active-item' : '' ?>"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                    <li class="<?=($page == 'allbook.php') ? 'active-item' : '' ?>"><a href="allbook.php"><i class="fa fa-book" aria-hidden="true"></i><span>All Books</span></a></li>
                                    <li class="<?=($page == 'issuebooks.php') ? 'active-item' : '' ?>"><a href="issuebooks.php"><i class="fa fa-book" aria-hidden="true"></i><span>Issue Books</span></a></li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- CONTENT -->
                <!-- ========================================================= -->
                <div class="content">






