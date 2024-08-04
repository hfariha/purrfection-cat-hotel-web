<!-- codes to verify admin username and password -->
<?php
    require('../includes/connect.php');
    if (isset($_POST['login'])){
        $admin_uname = $_POST['admin_uname'];
        $admin_pw = $_POST['admin_pw'];

        $sql = "SELECT * FROM admin_table WHERE admin_uname = '$admin_uname' AND admin_pw = '$admin_pw'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count==1){
            header("Location:index.php");
        }
        else{
            echo'<script>
                window.location.href = "loginadmin.php";
                alert("Login failed! Invalid username or password")
            </script>';
        }
    }
    
?>