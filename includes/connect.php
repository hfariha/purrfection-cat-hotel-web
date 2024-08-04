<!-- to connect with database -->

<?php

$connection =mysqli_connect('localhost','root','','cathotel_website');
// check connection
if($connection->connect_error){
    die("Connection failed".$connection->connect_error);
}
echo "";

?>