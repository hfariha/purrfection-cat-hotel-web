<?php
require('includes/connect.php');

if (isset($_POST['cust_payment'])) {
    
    $cust_selectedbook = $_POST['cust_selectedbook']; //bookingid
    $payment_proof=$_FILES['payment_proof']['name'];
    $temppayment_img=$_FILES['payment_proof']['tmp_name'];

    $insert_payment = "INSERT INTO payment (paymentmethod, paymentstatus, paymentproof , bookingid) VALUES ('Online Payment', 'Pending', '$payment_proof', '$cust_selectedbook')";

    // Execute the query            
    if ( empty($payment_proof)) {
            echo "<script>alert('Please fill all the fields.');</script>";
            exit();
    } else if ($connection->query($insert_payment) === TRUE) {
            move_uploaded_file($temppayment_img,"payment_proof/$payment_proof");
            header("Location: custview_bookinglist.php");           
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
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
            background-image: url('img/paymentformbg.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Booking Form</title>
</head>
<body>
<!-- <a href="rooms.php" class="text-decoration-none"><h4 class="text-dark p-5 back-btn"><i class="fa-solid fa-arrow-left fa-lg me-2"></i>Back</h4> -->
</a>
<div class="container mt-5 p-5">
    <h1 class="text-center mb-3 p-3">Payment Form</h1>
    <!-- from to insert room -->
    <div class="container bg-warning w-50 m-auto rounded shadow-sm">
        <form action="" method="POST" enctype="multipart/form-data" class="m-3 p-2">
        <label for='cust_selectedinfo' class='form-label' style='font-weight:600; font-size:21px;'>Booking Info:</label>
            <div class='input-group form-outline mb-4'>
                <span class='input-group-text' id='basic-addon1'><i class='fa-solid fa-money-check-dollar'></i></span>
                <select id='cust_selectedbook' name='cust_selectedbook' class='form-control shadow-none' required>
                <option value='request'>Please choose your information</option>
                <!-- get room info masuk dalam options -->
                <?php
                require('includes/connect.php');

                $select_query = "SELECT *, cust_table.cust_fullname FROM booking INNER JOIN cust_table ON booking.cust_id=cust_table.cust_id";
                $result_query=mysqli_query($connection,$select_query);

                while($row=mysqli_fetch_assoc($result_query)){
                    $bookingid=$row['bookingid'];
                    $cust_name=$row['cust_fullname'];
                    $checkin=$row['checkin'];
                    $checkout = $row['checkout'];

                    echo "<option value='$bookingid' id='cust_selectedbook'><p>Name: $cust_name Book: $checkin until $checkout</p></option>";
                }

                ?>
                </select>
            </div>
            <?php
            session_start();

            // Retrieve the total_price from the session variable
            $total_price = $_SESSION['totalprice'];

            // Display the total_price
            echo "<div class='input-group form-outline mb-4'>
            <label for='displaytotalprice' class='form-label' style='font-weight:600; font-size:21px;'>Total Price : RM $total_price.00</label>
            </div>";

            // Clear the session variable
            unset($_SESSION['totalprice']);
            ?>

            <label for="payment_proof" class="form-label" style="font-weight:600; font-size:21px;">Payment Proof:</label>
            <div class="input-group form-outline mb-4">
                <input required type="file" name="payment_proof" id="payment_proof" class="form-control">
            </div>

            <!-- button save -->
            <div class="input-group form-outline mb-4">
                <input type="submit" name="cust_payment" id="cust_payment" class="btn btn-dark p-3 m-auto mt-4" value="   Submit Payment   ">
            </div>
        </form>
    </div>
</div>
        
    
</body>
</html>
    
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>