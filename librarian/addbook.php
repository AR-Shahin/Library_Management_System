<?php 
require_once 'header.php' ;
include('../include/db.php');
if(isset($_POST['save-btn'])){
    $book_name = $_POST['book_name'];
    $book_author = $_POST['book_author'];
    $book_quantity = $_POST['book_quantity'];
    $book_avilable = $_POST['book_avilable'];
    $book_image = $_FILES['image']['name'];
    $lib =  $_SESSION['lib_user_name'];
    if(!empty($book_name) || !empty($book_author) || !empty($book_quantity) || !empty($book_avilable) || !empty($book_image) ) {
        $image = rand(1,8888) . $book_image;
        $sql = "SELECT * FROM `books` WHERE `book_name` = '$book_name'";
        $res = mysqli_query($con,$sql);
        $row = mysqli_num_rows($res);
        if($row == 0){
            $sql = "INSERT INTO `books`( `book_name`, `book_image`, `book_author`, `book_quantity`, `book_avilable`, `librian_name`) VALUES ('$book_name','$image','$book_author',$book_quantity,$book_avilable,'$lib')";
            if(mysqli_query($con,$sql)){
                $img_upload = '../images/book/' . $image;
                move_uploaded_file($_FILES['image']['tmp_name'], $img_upload);
                $book_inserted_success = "Inserted Successfully!";
            }else{
                $book_not_inserted_succss = "Not Inserted!";
            }
        }
        else{
            $error_book = "Book already exists!";
        }

    } else{
        $error = "Something Wrong!";
    }
}
?>
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="">Add Book</a></li>
        </ul>
    </div>
</div>    
<div class="row animated fadeInUp">
    <div class="col-md-8 form-box">
        <form class="form-horizontal " style="border:1px solid;padding:10px;" method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data"> 
            <h5 class="mb-lg text-center">Add New Book</h5>
            <?php  if(isset($error)){?>
            <div class="alert alert-danger alert-dismissible show" role="alert">
                <b><?= $error ?></b> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php }?>
            <?php  if(isset($book_inserted_success)){?>
            <div class="alert alert-success alert-dismissible show" role="alert">
                <b><?= $book_inserted_success ?></b> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php }?>
            <?php  if(isset($book_not_inserted_succss)){?>
            <div class="alert alert-danger alert-dismissible show" role="alert">
                <b><?= $book_not_inserted_succss ?></b> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php }?>
            <?php  if(isset($error_book)){?>
            <div class="alert alert-danger alert-dismissible show" role="alert">
                <b><?= $error_book ?></b> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php }?>
            <div class="form-group">
                <label for="bookname" class="col-sm-2 control-label">Book Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bookname" placeholder="Book Name" name="book_name" value="<?= isset($book_name) ? $book_name : '' ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="bookname" class="col-sm-2 control-label">Book Author</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bookname" placeholder="Book Author Name" name="book_author" value="<?= isset($book_author) ? $book_author : '' ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="bookname" class="col-sm-2 control-label">Book Quantity</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="bookname" placeholder="Book Quantity" name="book_quantity" value="<?= isset($book_quantity) ? $book_quantity : '' ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="bookname" class="col-sm-2 control-label">Book Avilable</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="bookname" placeholder="Book Avilable" name="book_avilable" value="<?= isset($book_avilable) ? $book_avilable : '' ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="bookname" class="col-sm-2 control-label">Book Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="image" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="submit" class="form-control btn btn-info btn-block" id="bookname" value="Save Book" name="save-btn">
                </div>
            </div>
        </form>
    </div>

</div>
<style>
    .form-box{
        margin-left:200px
    }
</style>
<?php require_once 'footer.php' ?>