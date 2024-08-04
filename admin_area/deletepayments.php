<?php
require('../includes/connect.php');
if(isset($_GET['id'])){
    $payment_id=$_GET['id'];
    $sql="DELETE FROM payment WHERE paymentid=$payment_id";
    $result=mysqli_query($connection,$sql);
    if($result){
        header('location:admin-payment.php');
    }else{
        die(mysqli_error($connection));
    }
}
?>