<?php
include('../include/db.php');
$id = base64_decode($_GET['id']);

 $sql = "SELECT *  FROM `books` WHERE `id` = $id";
 $res =  mysqli_query($con,$sql);
 $data = mysqli_fetch_assoc($res);
unlink('../images/book/'. $data['book_image']);
$sql = "DELETE FROM `books` WHERE `id` = $id";
if(mysqli_query($con,$sql))
{
    $delete_image = "Delete image SuccessFully";
     header('location:managebook.php');
}else{
   $not_dlt = "Not delete";
    header('location:managebook.php');
}


?>
