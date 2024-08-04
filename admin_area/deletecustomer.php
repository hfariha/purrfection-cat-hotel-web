<?php
require('../includes/connect.php');
if(isset($_GET['id'])){
    $cust_id=$_GET['id'];
    $sql="DELETE FROM cust_table WHERE cust_id=$cust_id";
    $result=mysqli_query($connection,$sql);
    if($result){
        header('location:admin-customers.php');
    }else{
        die(mysqli_error($connection));
    }
}
?>