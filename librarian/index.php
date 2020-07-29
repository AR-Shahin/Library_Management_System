
<?php 
require_once 'header.php'; 
?>
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
        </ul>
    </div>
</div>    
<div class="row animated fadeInUp">
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="panel widgetbox wbox-2 bg-darker-2 color-light" style="background:red">
            <a href="requestbook.php">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-xs-4">
                            <span class="icon fa fa-book color-lighter-1"></span>
                        </div>

                        <?php
                        $sql = "SELECT * FROM `request_book`";
                        $res = mysqli_query($con,$sql);
                        $total_req = mysqli_num_rows($res);
                        ?>
                        <div class="col-xs-8">
                            <h4 class="subtitle color-lighter-1">Request Books</h4>
                            <h1 class="title color-light"><b><?= $total_req?></b></h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="panel widgetbox wbox-2 bg-darker-2 color-light" style="background:red">
            <a href="students.php">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-xs-4">
                            <span class="icon fa fa-users color-lighter-1"></span>
                        </div>
                        <?php
    $sql = "SELECT * FROM `students`";
                                $res = mysqli_query($con,$sql);
                                $total_students = mysqli_num_rows($res);
                        ?>
                        <div class="col-xs-8">
                            <h4 class="subtitle color-lighter-1">Total Student</h4>
                            <h1 class="title color-light"><b><?= $total_students?></b></h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="panel widgetbox wbox-2 bg-darker-2 color-light" style="background:red">
            <a href="managebook.php">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-xs-4">
                            <span class="icon fa fa-book color-lighter-1"></span>
                        </div>
                        <?php
    $sql = "SELECT * FROM `books`";
                                $res = mysqli_query($con,$sql);
                                $total_books = mysqli_num_rows($res);
                        ?>
                        <div class="col-xs-8">
                            <h4 class="subtitle color-lighter-1">Total Books</h4>
                            <h1 class="title color-light"><?= $total_books?></h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div> 
     <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="panel widgetbox wbox-2 bg-darker-2 color-light" style="background:red">
        <a href="index.php">
            <div class="panel-content">
                <div class="row">
                    <div class="col-xs-4">
                        <span class="icon fa fa-book color-lighter-1"></span>
                    </div>
                    <?php
                                $sql = "SELECT SUM(`book_quantity`)as total_quantity_book FROM books`";
                                $res = mysqli_query($con,$sql);
                                $total_quan_book = mysqli_fetch_assoc($res);
                                $sql = "SELECT SUM(`book_avilable`)as total_avilable_book FROM `books` ";
                                $res = mysqli_query($con,$sql);
                                $total_avilable_book = mysqli_fetch_assoc($res);
                    ?>
                    <div class="col-xs-8">
                        <h4 class="subtitle color-lighter-1">Quantity and Avilable</h4>
                        <h6 class="title color-light"><?=$total_quan_book['total_quantity_book'].' - ' .$total_avilable_book['total_avilable_book']  ?></h6>
                    </div>
                </div>
            </div>
        </a>
    </div>
    </div>
    <div class="row mt-5" >
        <div class="col-sm-6 col-md-4">
            <div class="panel">
                <img src="../images/libraian/chat1.png" alt="" style="width:100%">
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="panel">
                <img src="../images/libraian/chat2.png" alt="" style="width:100%">
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="panel">
                <img src="../images/libraian/chat3.png" alt="" style="width:100%">
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php' ?>

