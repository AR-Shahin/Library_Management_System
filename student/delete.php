<?php 
include('../include/db.php');
    if(isset($_GET['bookid'])){
      echo   $id = $_GET['bookid'];
        $sql = "DELETE FROM `request_book` WHERE `request_book`.`book_id` = $id";
        $res = mysqli_query($con,$sql);
        if($res){
            header('location:allbook.php');
        }
    }
    ?>