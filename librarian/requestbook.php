<?php include('header.php') ;
?>

<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="">Request Book</a></li>

        </ul>
    </div>
</div>    
<div class="row animated fadeInUp">
    <h4 class="section-subtitle"><b>Request Books Overview</b></h4>
    <div class="panel">
        <div class="panel-content">
            <div class="table-responsive">
                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered border" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Student ID</th>
                            <th>Book Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include('../include/db.php');
                        $sql = "SELECT * FROM `request_book` ORDER BY id DESC ";
                        $result =mysqli_query($con,$sql);
                        while($row = mysqli_fetch_assoc($result)){?>
                        <tr>
                            <td><?= $row['student_name']?></td>
                            <td><?= $row['student_id']?></td>
                            <td><?= $row['book_name']?></td>
                            <td>
                                <a href="requestbook.php?req_id=<?= $row['id']?>&book_id=<?= $row['book_id']?>">Issue Book</a>
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
if(isset($_GET['req_id']) && isset($_GET['book_id'])){
    $lib = $_SESSION['for_issue_book_page'] ;
    $req_id = $_GET['req_id'];
    echo $book_id = $_GET['book_id'];
    $date =  date('m-d-Y') ;
    $sq ="SELECT students.`id` FROM `students` INNER JOIN request_book ON students.uid = request_book.student_id WHERE request_book.id = $req_id ";
    $r =mysqli_query($con,$sq);
    if($r){
        $ro = mysqli_fetch_assoc($r);
        $std_id = $ro['id'];
        $sql = "INSERT INTO `issue_book`(`student_id`, `book_id`, `lib_name`, `isssue_date`) VALUES ('$std_id', $book_id,'$lib','$date')";
        $res = mysqli_query($con,$sql);
        if($res){
            $sql = "UPDATE `books` SET `book_avilable` = `book_avilable`-1 WHERE `id` = $book_id ";
            mysqli_query($con,$sql);
            $sql = "DELETE FROM `request_book` WHERE `id` = $req_id";
            $ars =   mysqli_query($con,$sql);
            if($ars){ ?>
<script>
    alert("Request Book Successfully");
    history.go(-1);
</script>

<?php }   }else{
            echo 'not isu';
        }
    }
    else{
        echo 'hy na';
        die();
    }

}
?>

<?php include('footer.php'); ?>