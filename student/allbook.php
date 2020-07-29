
<?php 
require_once 'header.php';

?>
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="#">All Books</a></li>
        </ul>
    </div>
</div>    
<div class="row animated fadeInUp">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="panel">
            <div class="panel-content">
                <form class="" method="get">
                    <div class="row pt-md">
                        <div class="form-group col-sm-9 col-lg-10">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="lefticon" placeholder="Search a Book" required name ="search_key">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                        <div class="form-group col-sm-3  col-lg-2 ">
                            <button type="submit" class="btn btn-primary btn-block" name="search">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if(isset($_GET['search'])){
            $key = $_GET['search_key'];
            $sql = "SELECT * FROM `books` WHERE `book_name` LIKE '%$key%' ";
            $result = mysqli_query($con,$sql);
            $row =  mysqli_num_rows($result);
            if($row == 0)
            {?>
        <div class="panel">
            <div class="panel-content text-center">
                <h2>Book not Found  : ) </h2>
            </div>
        </div>

        <?php  }
            else{ ?>
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <?php while($books = mysqli_fetch_assoc($result)){ ?>
                    <div class="col-sm-3 text-center">
                        <img src="../images/book/<?= $books['book_image']?>" alt="" style="width:100%;height:350px">
                        <h5><?= $books['book_name']?></h5>
                        <p>Available : <span><?= $books['book_avilable']?></span></p>
                        <a href="" class="btn btn-success btn-sm">Request For Book <i class="fa fa-plus" style="margin-left:3px"></i></a>
                        <hr>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php }
        }//isset
        else{
            $sql = "SELECT * FROM `books` WHERE `book_avilable` > 0 ORDER BY id DESC";
            $res = mysqli_query($con,$sql);?>
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <?php while($books = mysqli_fetch_assoc($res)){ ?>
                    <div class="col-sm-3 text-center">
                        <img src="../images/book/<?= $books['book_image']?>" alt="" style="width:100%;height:350px">
                        <h5><?= $books['book_name']?></h5>
                        <p>Available : <span><?= $books['book_avilable']?></span></p>
                        <a href="" class="btn btn-success btn-sm">Request For Book <i class="fa fa-plus" style="margin-left:3px"></i></a>
                        <hr>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php  }  ?>
    </div>
</div>
<?php require_once 'footer.php' ?>