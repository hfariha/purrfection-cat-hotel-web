<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purrfection Cat Hotel | Customer Booking List </title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">

    <style>

        /* style admin logo */
        .adminlogo{
            width:100px;
            object-fit: contain;
            padding-left: 35px;
            padding-top : 10px;
        }

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            background-image: url('img/paymentformbg.png');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .centerdropdown{
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 90px;
        }

        .btns{
            border-radius: 50px;
            font-weight: 500;
            text-align: center;
        }

    </style>
</head>
<body>
    
<!-- nav bar -->
   <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <img src="img/logohotelcat.png" alt="" class="adminlogo">
                <h1 class="navbar-brand mx-auto adminfont"><i class="fa-solid fa-book"></i> Purrfection Cat Hotel Booking List</h1>
            </div>
        </nav>
    </div>

        <!-- Second part -->
    <div class="bg-white secondpadding-admin">
        <a href="homepage.php" class="text-decoration-none"><h4 class="text-dark p-5 back-btn"><i class="fa-solid fa-arrow-left fa-lg me-2"></i>Exit</h4>
        </a>
            <h3 class="text-center mb-4"><i class="fa-solid fa-cat"></i> Thank you for choosing us! <i class="fa-solid fa-paw"></i></h3>
            <h6 class="mt-1 text-muted text-center">*We will contact you through Whatsapp on the first boarding day</h6>
    </div>
        
        <!-- Third part -->
        <!-- Start Admin Management Section -->
    
            <div class="container text-center">
                <table class="table table-hover table-striped text-center">
                    <thead class="table-dark">
                        <tr>
                        <th scope="col">Booking ID</th>
                        <th scope="col">Check In Date</th>
                        <th scope="col">Check Out Date</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Customer Full Name</th>
                        <th scope="col">Booked Room ID</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Click to View and Print Receipt</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require('includes/connect.php');
                        $sql = "SELECT *, cust_table.cust_fullname FROM booking INNER JOIN cust_table ON booking.cust_id=cust_table.cust_id";
                        $result = mysqli_query($connection, $sql);
                        $num_of_rows=mysqli_num_rows($result);
                        if($num_of_rows==0){
                            echo "<h2 class='text-center text-danger'>No bookings are made</h2>";
                        }
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td><?php echo $row['bookingid'] ?></td>
                                <td><?php echo $row['checkin'] ?></td>
                                <td><?php echo $row['checkout'] ?></td>
                                <td><?php echo $row['cust_id'] ?></td>
                                <td><?php echo $row['cust_fullname'] ?></td>
                                <td><?php echo $row['rooms_id'] ?></td>
                                <td>RM <?php echo $row['totalprice'] ?>.00</td>
                                <td>
                                    <a href="printreceipt.php?id=<?php echo $row['bookingid']?>" class="link-dark"><i class="fa-solid fa-receipt"></i></a>
                                </td>
                                </tr>
                            <?php
                            
                        }
                        ?>
                        
                        
                    </tbody>
                </table>
            </div>



    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>