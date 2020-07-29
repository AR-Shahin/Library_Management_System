
<?php 
include('../include/db.php');
if(isset($_GET['req_id']) && isset($_GET['book_id'])){
    $req_id = $_GET['req_id'];
    echo $_GET['book_id'] . '<br>';
    echo date('m-d-Y') . '<br>';
    $sql ="SELECT students.`id` FROM `students` INNER JOIN request_book ON students.uid = request_book.student_id WHERE request_book.id = $req_id ";

    $result =mysqli_query($con,$sql);
    if($result){
        $row = mysqli_fetch_assoc($result);
        echo $row['id'];
    }
    else{
        echo 'hy na';
    }

}