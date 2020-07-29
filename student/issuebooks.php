<?php include('header.php');
include('../include/db.php');?>

<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li><a href="#">Issue Books</a></li>

        </ul>
    </div>
</div>    
<div class="row animated fadeInUp">
    <div class="col-12 col-sm-12 col-md-12">

        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered border" cellspacing="0" width="100%">
                        <thead>
                            <tr class="text-center">
                                <th>Book Name</th>
                                <th>Book Image</th>
                                <th>Book Issue Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $s_id = $_SESSION['user_success_id'];

                            $sql = "SELECT `issue_book`.`isssue_date`,`books`.`book_name`,`books`.`book_image` FROM `books` INNER JOIN `issue_book` ON `issue_book`.`book_id` = `books`.`id` WHERE `issue_book`.`student_id` = $s_id AND `issue_book`.`return_date` = '' ORDER BY `issue_book`.`id` DESC";
                            $res = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_assoc($res)){?>
                            <tr>
                                <td><strong><?= $row['book_name']?></strong></td>
                                <td class="text-center"><img src="../images/book/<?= $row['book_image']?>" alt="" width="100"></td>
                                <td class="text-center"><?= $row['isssue_date']?></td>
                            </tr>
                            <?php }?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>