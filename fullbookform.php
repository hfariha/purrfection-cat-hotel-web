<?php
require('includes/connect.php');
    // Form submission handling
    if (isset($_POST['booking-save'])) {
        // Get custdetails from the form
        $cust_fullname=$_POST['cust_fullname'];
        $cust_email=$_POST['cust_email'];
        $cust_phonenum=$_POST['cust_phonenum'];

        // Prepare the SQL statement for customer
        $insertcust = "INSERT INTO cust_table (cust_fullname, cust_email, cust_phonenum) VALUES ('$cust_fullname','$cust_email', '$cust_phonenum')";

        //query for cust
        if($connection->query($insertcust) === TRUE){
            //Get generated cust_id
            $cust_id = $connection->insert_id; //to pass into insert booking
            
            //Get booking details from the form
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
            $insert_booking = "INSERT INTO booking (checkin, checkout, totalprice, cust_id , rooms_id) VALUES ('$cust_checkin', '$cust_checkout', '$total_price', '$cust_id', '$cust_selectedroom')";

            if($connection->query($insert_booking) === TRUE) {
                header("Location: paymentform.php");

            } else if ( empty($cust_selectedinfo) || empty($cust_checkin) || empty($cust_checkout) || empty($cust_selectedroom)) {
                echo "<script>alert('Please fill all the fields.');</script>";
                header("Location: fullbookform.php");
                exit();
            }

        } else {
            echo "Error inserting data into the customer table: " . $connection->error;
        }
        
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Booking Form Details</title>
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
            background-image: url('img/addnewroombg.png');
            background-repeat: no-repeat;
            background-size: cover;
        }

    </style>
</head>
<body class="bg-light">
<!-- back to admin dashboard -->
<a href="homepage.php" class="text-decoration-none"><h4 class="text-dark p-5 back-btn"><i class="fa-solid fa-arrow-left fa-lg me-2"></i>Back</h4>
</a>

<div class="container mt-5">
    <h1 class="text-center mb-3">Booking Form</h1>
    <!-- from to insert room -->
    <div class="container bg-warning w-50 m-auto rounded shadow-sm">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data" class="m-3 p-2">
            <label for="full-custname" class="form-label" style="font-weight:600; font-size:21px;">Full Name</label>
            <div class="input-group form-outline mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-signature"></i></span>
                <input required type="text" autocomplete="off" name="cust_fullname" id="cust_fullname" class="form-control" placeholder="Enter Your Full Name">
            </div>
            <label for="email-cust" class="form-label" style="font-weight:600; font-size:21px;">Email</label>
            <div class="input-group form-outline mb-4">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input required type="text" autocomplete="off" name="cust_email" id="cust_email" class="form-control" placeholder="Enter Your Email Address">
            </div>
            <label for="phone-cust" class="form-label" style="font-weight:600; font-size:21px;">Phone Number</label>
            <div class="input-group form-outline mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-signature"></i></span>
                <input required type="text" autocomplete="off" name="cust_phonenum" id="cust_phonenum" class="form-control" placeholder="Enter Your Phone Number">
            </div>
            <label for="checkin-cust" class="form-label" style="font-weight:600; font-size:21px;">Check-In Date</label>
            <div class="input-group form-outline mb-4" style="height:100px;">
                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                <input type="date" name="cust_checkin" autocomplete="off" id="cust_checkin" required class="form-control shadow-none">
            </div>
            <label for="checkout-cust" class="form-label" style="font-weight:600; font-size:21px;">Check-Out Date</label>
            <div class="input-group form-outline mb-4" style="height:100px;">
                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                <input type="date" name="cust_checkout" autocomplete="off" id="cust_checkout" required class="form-control shadow-none">
            </div>
            <p class="mt-4 text-muted text-center">*Please choose a room based on your total cats</p>
            <label for='cust_selectedroom' class='form-label' style='font-weight:600; font-size:21px;'>Selected Room:</label>
            <div class='input-group form-outline mb-4'>
                <span class='input-group-text' id='basic-addon1'><i class='fa-solid fa-money-check-dollar'></i></span>
                <select id='cust_selectedroom' name='cust_selectedroom' class='form-control shadow-none' required>
                    <option value='request'>Please choose your selected room</option>
                    <!-- get room info masuk dalam options -->
                    <?php
                    require('includes/connect.php');

                    $select_query = "SELECT * FROM room_table WHERE rooms_totalavailability > 0";
                    $result_query=mysqli_query($connection,$select_query);

                    while($row=mysqli_fetch_assoc($result_query)){
                        $rooms_id=$row['rooms_id'];
                        $rooms_name=$row['rooms_name'];
                        $rooms_price = $row['rooms_price'];
                        $rooms_capacity = $row['rooms_capacity'];

                        echo "<option value='$rooms_id'id='cust_selectedroom'><p>$rooms_name , $rooms_capacity ,RM $rooms_price .00</p> </option>";
                    }

                    ?>
                </select>
            </div>
            <div class="input-group form-outline mb-4">
                <input required type="submit" name="booking-save" id="booking-save" class="btn btn-dark p-3 m-auto mt-4" value="  Confirm Booking   ">
            </div>
        </form>
    </div>
</div>



    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>