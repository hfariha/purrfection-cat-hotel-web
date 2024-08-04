<?php
require('includes/connect.php');

if (isset($_POST['cust_booking'])) {
    
    $cust_selectedinfo = $_POST['cust_selectedinfo'];
    $cust_checkin= $_POST['cust_checkin'];
    $cust_checkout= $_POST['cust_checkout'];
    $cust_selectedroom= $_POST['cust_selectedroom'];

    //Retrieve room information
    $select_room = "SELECT * FROM room_table WHERE rooms_id = $cust_selectedroom";
    $result_room = mysqli_query($connection, $select_room);
    $room = mysqli_fetch_assoc($result_room);

    //Calculate based on days
    session_start(); //store final total price to display it later on payment form
    $price_per_day = $room['rooms_price'];
    $date1 = new DateTime($cust_checkin);
    $date2 = new DateTime($cust_checkout);
    $interval = $date1->diff($date2);
    $total_days = $interval->format('%a');
    $total_price = $total_days * $price_per_day;
    $_SESSION['totalprice'] = $total_price;

    //update availability
    $new_availability = $room['rooms_totalavailability'] - 1;
    $update_availability = "UPDATE room_table SET rooms_totalavailability = $new_availability WHERE rooms_id = $cust_selectedroom";
    $currentupdate_avail = mysqli_query($connection, $update_availability);

    //insert booking table
    $insert_booking = "INSERT INTO booking (checkin, checkout, totalprice, cust_id , rooms_id) VALUES ('$cust_checkin', '$cust_checkout', '$total_price', '$cust_selectedinfo', '$cust_selectedroom')";

    // Execute the query            
    if ( empty($cust_selectedinfo) || empty($cust_checkin) || empty($cust_checkout) || empty($cust_selectedroom)) {
            echo "<script>alert('Please fill all the fields.');</script>";
            exit();
    } else if ($connection->query($insert_booking) === TRUE) {
            // echo "<script>alert('Room inserted successfully Total Price: $total_price')</script>";
            header("Location: paymentform.php");
            
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<div class="container mt-5">
    <h1 class="text-center mb-3">Boarding Room Booking Form</h1>
    <!-- from to insert room -->
    <div class="container bg-warning w-50 m-auto rounded shadow-sm">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data" class="m-3 p-2">
        <label for='cust_selectedinfo' class='form-label' style='font-weight:600; font-size:21px;'>Customer Info:</label>
            <div class='input-group form-outline mb-4'>
                <span class='input-group-text' id='basic-addon1'><i class='fa-solid fa-money-check-dollar'></i></span>
                <select id='cust_selectedinfo' name='cust_selectedinfo' class='form-control shadow-none' required>
                <option value='request'>Please choose your information</option>
                <!-- get room info masuk dalam options -->
                <?php
                require('includes/connect.php');

                $select_query = "SELECT * FROM cust_table order by rand()";
                $result_query=mysqli_query($connection,$select_query);

                while($row=mysqli_fetch_assoc($result_query)){
                    $cust_id=$row['cust_id'];
                    $cust_fullname=$row['cust_fullname'];
                    $cust_phonenum = $row['cust_phonenum'];
                    $cust_totalcat=$row['cust_totalcat'];

                    echo "<option value='$cust_id' id='cust_selectedinfo'> $cust_id , <p>$cust_fullname , $cust_phonenum, $cust_totalcat Cats</p></option>";
                }

                ?>
            </select>
            </div>

            <!-- buat new DateTime kira hari lepastu darab dgn price  -->
            <label for="checkin-cust" class="form-label" style="font-weight:600; font-size:21px;">Check-In Date</label>
            <div class="input-group form-outline mb-4" style="height:100px;">
                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                <input type="date" name="cust_checkin" id="cust_checkin" required class="form-control shadow-none">
            </div>
            <label for="checkout-cust" class="form-label" style="font-weight:600; font-size:21px;">Check-Out Date</label>
            <div class="input-group form-outline mb-4" style="height:100px;">
                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                <input type="date" name="cust_checkout" id="cust_checkout" required class="form-control shadow-none">
            </div>
            <br>
            <p class="mt-4 text-muted text-center">*Please choose a room based on your total cats</p>
            <label for='cust_selectedroom' class='form-label' style='font-weight:600; font-size:21px;'>Selected Room:</label>
            <div class='input-group form-outline mb-4'>
                <span class='input-group-text' id='basic-addon1'><i class='fa-solid fa-money-check-dollar'></i></span>
                <select id='cust_selectedroom' name='cust_selectedroom' class='form-control shadow-none' required>
                    <option value='request'>Please choose your selected room</option>
                    <!-- get room info masuk dalam options -->
                    <?php
                    require('includes/connect.php');

                    $select_query = "SELECT * FROM room_table";
                    $result_query=mysqli_query($connection,$select_query);

                    while($row=mysqli_fetch_assoc($result_query)){
                        $rooms_id=$row['rooms_id'];
                        $rooms_name=$row['rooms_name'];
                        $rooms_price = $row['rooms_price'];
                        $rooms_capacity = $row['rooms_capacity'];

                        echo "<option value='$rooms_id'id='cust_selectedroom'> $rooms_id , <p>$rooms_name , $rooms_capacity ,RM $rooms_price .00</p> </option>";
                    }

                    ?>
                </select>
                </div>
            <!--
            <label for="payment-method" class="form-label" style="font-weight:600; font-size:21px;">Payment Method:</label>
            <div class="input-group form-outline mb-4" style="height:100px;">
                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                <input type="text" name="cust_paymentmethod" id="cust_paymentmethod" required class="form-control" placeholder="Please fill in your payment method whether it is Cash/Online">
            </div> -->
            <!-- payment online / cash
            <label for="payment_method" class="form-label" style="font-weight:600; font-size:21px;">Payment Method:</label>
            <div class="input-group form-outline mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-money-check-dollar"></i></span>
            <select id="cust_paymentmethod" name="cust_paymentmethod" class="form-control shadow-none" required>
                <option value="request">Please choose your payment method</option>
                <option value="cash" >Cash on Arrival</option>
                <option value="online" id="online-payment-form">Online Payment</option>
            </select>
            </div> -->

            <!-- <div>
            <p>Payment Status (will be verified by admin):</p>
            <p>Payment Depending</p>
            </div>
        
            for insert payment proof -->
            <!-- <div id="online_payment_form" style="display: none;">
            Online payment proof -->
                <!-- <label for="onlinepayment-proof" name="cust_paymentproof" class="form-label" style="font-weight:600; font-size:21px;">Online Payment Proof:</label>
                <div class="input-group form-outline mb-4" name="cust_paymentproof">
                    <input type="file" name="cust_paymentproof" id="cust_paymentproof" class="form-control">
                </div>
            </div> -->

            <!-- button save -->
            <div class="input-group form-outline mb-4">
                <input type="submit" name="cust_booking" id="cust_booking" class="btn btn-dark p-3 m-auto mt-4" value="   Submit Booking   ">
            </div>
        </form>
    </div>
</div>
        <!-- script for file chosen to appear if customer choose online payment -->
        <script type="text/javascript">
            document.getElementById('cust_paymentmethod').addEventListener('change', function() {
            var paymentMethod = document.getElementById('cust_paymentmethod').value;
            var onlinePaymentProof = document.getElementById('online-payment-form');
            
            if (paymentMethod === 'online') {
            onlinePaymentProof.style.display = 'block';
            } else {
            onlinePaymentProof.style.display = 'none';
            }
            });
        </script>


    <!-- <h1>Booking Form</h1>
    <form action="process_booking.php" method="POST">
        <label for="customer_id">Customer Name:</label>
        <input type="text" id="customer_id" name="customer_id" required>
        
        <label for="room_id">Room ID:</label>
        <input type="text" id="room_id" name="room_id" required>
        
        <label for="check_in_date">Check-in Date:</label>
        <input type="date" id="check_in_date" name="check_in_date" required>
        
        <label for="check_out_date">Check-out Date:</label>
        <input type="date" id="check_out_date" name="check_out_date" required>

        <input type="submit" value="Book Now">
    </form> -->
    
</body>
</html>
    
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>