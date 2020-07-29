
<?php 
require_once 'header.php';


?>
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li><a href="">Issue Book</a></li>
        </ul>
    </div>
</div>    
<div class="row animated fadeInUp">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel-content" style="background:rgba(255, 255, 255, 0.45);padding:20px">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php
                    if(isset($_POST['search-btn'])){
                        $id = $_POST['sid'];
                        $sql = "SELECT * FROM `students` WHERE `uid` = '$id' AND `status` = 1 ";
                        $res = mysqli_query($con,$sql);
                        $student = mysqli_num_rows($res);
                        if($student == 0){
                            $studentNotfind = 1;  
                        }else{
                            $studentFind = 1;
                        }
                    }
                    ?>
                    <h4><?= isset($studentNotfind) ? 'Student Not Found : )' : ''?></h4>

                    <form class="form-inline" method="post" action="">
                        <div class="form-group">
                            <input type="text" class="form-control" id="email4" placeholder="Student ID " required name="sid" <?= isset($sid) ? $sid : '' ?>>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="search-btn" >Search </button>
                        </div>
                    </form>
                </div> 
            </div>  

            <?php if(isset($studentFind)){
    $data = mysqli_fetch_assoc($res);

            ?>

            <div class="issue-content" style="margin-top:20px;border:1px solid;padding:15px;box-shadow:2px 2px 3px #ccc"> 
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="email">Student Name</label>
                                    <input type="text" class="form-control" id="email" value="<?= $data['name'];?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="password">Student ID</label>
                                    <input type="text" class="form-control" id="password" value="<?= $data['uid'];?>" readonly>
                                    <input type="hidden" value="<?= $data['id'];?>" name="sid">
                                </div>
                                <div class="form-group">
                                    <label for="password">Book</label>
                                    <select name="book_id" id="" class="form-control" required>
                                        <option value="">Select A Book</option>
                                        <?php #date('d-M-Y',strotime())
    $sql = "SELECT * FROM `books` WHERE `book_avilable`> 0 ORDER BY id  DESC";
    $res = mysqli_query($con,$sql);
    while($books = mysqli_fetch_assoc($res)){?>
                                        <option value="<?= $books['id']?>"><?= $books['book_name']?></option> 

                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Issue Date</label>
                                    <input type="text" class="form-control" id="password" value="<?= date('d-M-Y')?>" readonly name="issue_date">
                                </div>
                                <div class="form-group">
                                    <label for="password">Libraian</label>
                                    <input type="text" class="form-control" id="password" value="<?= $_SESSION['for_issue_book_page']?>" readonly name="lib_name">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="issue-book" onclick="a()">Issue Book</button>
                                </div>
                            </form>
                            <hr>

                            <div class="student_issued_book mt-5" style="border-top:1.5px solid;padding:15px">
                                <h4 class="text-center">Previous Issued Book</h4>
                                <table class="table table-striped nowrap table-hover table-bordered">
                                    <thead>
                                        <tr>

                                            <th>Book Name</th>
                                            <td>Issue Date</td>
                                            <td>Return Date</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
        $id =$data['id'];
    #$sql = "SELECT * FROM issue_book WHERE student_id = $id";
    $sql = "SELECT `issue_book`.`return_date`,`issue_book`.`isssue_date`,`issue_book`.`id`,`books`.`book_name` FROM books INNER JOIN `issue_book` ON `issue_book`.`book_id` = `books`.`id` WHERE `issue_book`.`student_id` = $id ";
    $res = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($res)){ ?>
                                        <tr>
                                            <td><?= $row['book_name']?></td>
                                            <td><?= $row['isssue_date']?></td>
                                            <td><?= $row['return_date']?></td>
                                            <td class="text-center"><a href="issuebook.php?issue=<?= $row['id']?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>

                                        <?php  } ?>
                                        <?php
    if(isset($_GET['issue'])){
        $issue_id = $_GET['issue'];
        $sql = "DELETE FROM `issue_book` WHERE `issue_book`.`id` = $issue_id";
        $res = mysqli_query($con,$sql);
     }?>

                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- col-12 -->
                    </div>
                </div>
            </div> <?php }?>
        </div>
    </div>
</div>

<?php
function doubleUser($sid,$book_id)
{

    $con = mysqli_connect('localhost','root','','lms');
    $sql = "SELECT * FROM issue_book WHERE book_id = $book_id AND  student_id = $sid AND return_date = ''";
    $res = mysqli_query($con,$sql);
    $row = mysqli_num_rows($res);
    if($row >0){
        return TRUE;
    }else{
        return FALSE;
    }
}
?>
<?php
if(isset($_POST['issue-book'])){
    $sid = $_POST['sid'];
    $book_id = $_POST['book_id'];
    $issue_date = $_POST['issue_date'];
    $lib_name = $_POST['lib_name'];

    if(doubleUser($sid,$book_id) == TRUE){ ?>
<script>
    alert("This Book Already Taken!");
</script>
<?php   } # INSERT INTO `issue_book`( `student_id`, `book_id`,`lib_name`, `isssue_date`) VALUES ('$sid',$book_id,'$lib_name',$issue_date')"
    else{  
        $sql = "INSERT INTO `issue_book`(`student_id`, `book_id`, `lib_name`, `isssue_date`) VALUES ('$sid ',$book_id,'$lib_name','$issue_date')";
        $res = mysqli_query($con,$sql);
        if($res){ 
            $sql = "UPDATE `books` SET `book_avilable` = `book_avilable`-1 WHERE `id` = $book_id ";
            mysqli_query($con,$sql);
?>
<script>
    alert("Insert Book Successfully");
</script>
<?php }else{ ?>
<script>
    alert("Not insert");
</script>
<?php }
    }
} //isset
?>

<?php require_once 'footer.php' ;?>


