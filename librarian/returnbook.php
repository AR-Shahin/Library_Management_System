<?php include('header.php') ;
?>

<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="">Return Book</a></li>

        </ul>
    </div>
</div>    
<div class="row animated fadeInUp">
    <h4 class="section-subtitle"><b>Return Books Overview</b></h4>
    <div class="panel">
        <div class="panel-content">
            <div class="table-responsive">
                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered border" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Student ID</th>
                            <th>Book Name</th>
                            <th>Issue Date</th>
                            <th>Issued Libraian</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../include/db.php');
                        $sql = "SELECT students.name,students.uid,books.book_name,books.id AS single,issue_book.id,issue_book.book_id,issue_book.isssue_date,issue_book.lib_name FROM issue_book INNER JOIN students ON issue_book.student_id = students.id INNER JOIN books ON issue_book.book_id = books.id WHERE issue_book.return_date = '' ";
                        $result =mysqli_query($con,$sql);
                        while($row = mysqli_fetch_assoc($result)){?>
                        <tr>
                            <td><?= $row['name']?></td>
                            <td><?= $row['uid']?></td>
                            <td><?= $row['book_name']?></td>
                            <td><?= $row['isssue_date']?></td>
                            <td><?= $row['lib_name']?></td>
                            <td>
                                <a href="returnbook.php?id=<?=base64_encode($row['id'])?>&bookid=<?= $row['single']?>">Return Book</a>
                            </td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_GET['id']) && isset($_GET['bookid'])){
    $book_id = $_GET['bookid'];
    $issue_id = base64_decode($_GET['id']);
    $date = date('d-m-y');
    $sql = "UPDATE `issue_book` SET `return_date` = '$date' WHERE id = $issue_id";
    $result =mysqli_query($con,$sql);
    if($result){
        $sql = "UPDATE `books` SET `book_avilable` = `book_avilable`+1 WHERE `id` =$book_id";
        mysqli_query($con,$sql);?>

<script>
    alert("Return Book Successfully");
    javascript:history.go(-1);
</script>
<?php }else{ 
        echo 'no';
    }
}

?>
<?php include('footer.php'); ?>