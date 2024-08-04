<?php
require('../includes/connect.php');
if(isset($_GET['id'])){
    $rooms_id=$_GET['id'];
    $sql="DELETE FROM room_table WHERE rooms_id=$rooms_id";
    $result=mysqli_query($connection,$sql);
    if($result){
        header('location:admin-rooms.php');
    }else{
        die(mysqli_error($connection));
    }
}
?>