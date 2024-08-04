<?php
require('../includes/connect.php');
    $id=$_GET['id'];
    if (isset($_POST['update_paymentstatus'])) {
        // Get room details from the form
        $payment_status=$_POST['payment_status'];
        

        // Prepare the SQL statement
        $update_pmstatus = "UPDATE payment SET paymentstatus='$payment_status' WHERE paymentid='$id'";
        if ( empty($payment_status)) {
            echo "<script>alert('Please fill all the fields.');</script>";
            exit();
        } else if ($connection->query($update_pmstatus) === TRUE) {
            echo "<script>alert('Room updated successfully')</script>";
            header('location:admin-payment.php');
            
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Rooms</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            background-image: url('../img/editpaymentstatusbg.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body class="bg-light">
<!-- back to admin dashboard -->
<a href="admin-payment.php" class="text-decoration-none"><h4 class="text-dark p-5 back-btn"><i class="fa-solid fa-arrow-left fa-lg me-2"></i>Back</h4>
</a>

<div class="container mt-5">
    <h1 class="text-center mb-3">Update Payment Status</h1>
    <p class="mt-4 text-muted text-center">*Change Payment Status to "Approved" or put any remarks</p>
    <!-- from to edit room -->
    <?php
    require('../includes/connect.php');
    $payment_id = $_GET['id'];
    $sql = "SELECT * FROM payment WHERE paymentid = '$payment_id' LIMIT 1";
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($result);
    
    ?>
    <div class="container bg-warning w-50 m-auto rounded shadow-sm">
        <form action="" method="POST" enctype="multipart/form-data" class="m-3 p-2">
            <label for="payment_status" class="form-label" style="font-weight:600; font-size:21px;">Payment Status:</label>
            <div class="input-group form-outline mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-signature"></i></span>
                <input type="text" name="payment_status" id="payment_status" value="<?php echo $row['paymentstatus'] ?>" class="form-control" placeholder="Enter Room Name">
            </div>
            <!-- button save -->
            <div class="input-group form-outline mb-4">
                <input type="submit" name="update_paymentstatus" id="update_paymentstatus" class="btn btn-dark p-3 m-auto mt-4" value="   Update Status   ">
            </div>
        </form>
    </div>
</div>



    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>