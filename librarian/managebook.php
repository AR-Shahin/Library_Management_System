
<?php 
require_once 'header.php' 
?>
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li><a href="">Manage Book</a></li>
        </ul>
    </div>
</div>    
<div class="row animated fadeInUp">
    <div class="col-12 col-sm-12 col-md-12">
        <h4 class="section-subtitle"><b>Books Overview</b></h4>
        <?php  if(isset($delete_image)){?>
        <div class="alert alert-success alert-dismissible show" role="alert">
            <b><?= 'ddddddddddddddddddd' ?></b> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php }?>
        <?php  if(isset($not_dlt)){?>
        <div class="alert alert-danger alert-dismissible show" role="alert">
            <b><?= $not_dlt ?></b> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php }?>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered border" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Book Name</th>
                                <th>Book Author</th>
                                <th>Book Quantity</th>
                                <th>Book Avilable</th>
                                <th>Librian</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            include('../include/db.php');
                            $sql = "SELECT * FROM `books` ORDER BY `id` DESC ";
                            $result =mysqli_query($con,$sql);
                            while($row = mysqli_fetch_assoc($result)){?>
                            <tr>
                                <td class="text-left"><?= $row['book_name']?></td>
                                <td><?= $row['book_author']?></td>
                                <td><?= $row['book_quantity']?></td>
                                <td><?= $row['book_avilable']?></td>
                                <td><?= $row['librian_name']?></td>
                                <td class="text-center"> <img src="../images/book/<?= $row['book_image']?>" alt="" width="50px"></td>
                                <td class="text-center">
                                    <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#book-<?= $row['id']?>"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#bookedit-<?= $row['id']?>"><i class="fa fa-pencil"></i></a>
                                    <a href="deleteimg.php?id=<?= base64_encode($row['id'])?>" class="btn btn-danger btn-sm dlt-btn" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$sql = "SELECT * FROM books ORDER BY id DESC";
$res = mysqli_query($con,$sql);
while ($books= mysqli_fetch_assoc($res)){;

?>
<div class="modal fade" id="book-<?= $books['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Detials</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped nowrap table-hover table-bordered">
                    <tbody>
                        <tr>
                            <th>Book Name</th>
                            <td><?= $books['book_name']?></td>
                        </tr>
                        <tr>
                            <th>Author Name</th>
                            <td><?= $books['book_author']?></td>
                        </tr>
                        <tr>
                            <th>Book Quantity</th>
                            <td><?= $books['book_quantity']?></td>
                        </tr>
                        <tr>
                            <th>Avilable Book</th>
                            <td><?= $books['book_avilable']?></td>
                        </tr>
                        <tr>
                            <th>Librain Name</th>
                            <td><?= $books['librian_name']?></td>
                        </tr>
                        <tr>
                            <th>Book Add Date</th>
                            <td><?= $books['date']?></td>
                        </tr>
                        <tr class="text-center"> 

                            <td colspan="2"><img src="../images/book/<?= $books['book_image']?>" alt="" class="w-25 mt-2"></td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php }?>

<!-- EDIT BOOK -->

<?php
$sql = "SELECT * FROM books ORDER BY id DESC";
$res = mysqli_query($con,$sql);
while ($books= mysqli_fetch_assoc($res)){;

?>
<div class="modal fade" id="bookedit-<?= $books['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Detials</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal " style="border:1px solid;padding:10px;" method="post" action="update.php?id=<?= $books['id']?>" enctype="multipart/form-data"> 
                    <h5 class="mb-lg text-center">Update Book</h5>
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
                        <label for="bookname" class="col-sm-3 control-label">Book Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="bookname" placeholder="Book Name" name="book_name" value="<?= $books['book_name']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bookname" class="col-sm-3 control-label">Book Author</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="bookname" placeholder="Book Author Name" name="book_author" value="<?= $books['book_author']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bookname" class="col-sm-3 control-label">Book Quantity</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="bookname" placeholder="Book Quantity" name="book_quantity" value="<?= $books['book_quantity']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bookname" class="col-sm-3 control-label">Book Avilable</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="bookname" placeholder="Book Avilable" name="book_avilable" value="<?= $books['book_avilable']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" class="form-control btn btn-info btn-block" id="bookname" value="Update Book" name="save-btn">
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php }?>
<?php require_once 'footer.php' ?>

