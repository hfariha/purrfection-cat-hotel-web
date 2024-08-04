<?php
require('../includes/connect.php');
if(isset($_GET['id'])){
    $bookingid=$_GET['id'];
    $sql="DELETE FROM booking WHERE bookingid=$bookingid";
    $result=mysqli_query($connection,$sql);
    if($result){
        header('location:admin-bookings.php');
    }else{
        die(mysqli_error($connection));
    }
}
?>