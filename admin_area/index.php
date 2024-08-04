<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purrfection Cat Hotel | Admin Dashboard </title>
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
            background-image: url('../img/adminpagepicbg.png');
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
                <img src="../img/logohotelcat.png" alt="" class="logo">
                <h1 class="navbar-brand mx-auto adminfont"> <i class="fa-solid fa-user colorwhite"></i> Admin Dashboard</h1>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <div class="d-flex">
                            <a href="../homepage.php" class="btn btn-outline-light shadow-none me-lg-2 me-3">Admin Logout</a>
                        </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>

        <!-- Second part -->
    <div class="bg-light secondpadding-admin">
            <h3 class="text-center p-5">Admin Management System</h3>
    </div>
        
        <!-- Third part -->
        <!-- Start Admin Management Section -->
    <div class="row align-items-center btns mb-5">
        <div class="col-md-12 p-1 align-items-center">
                <!-- write div that has columns and bg colour and padding -->
                <div class="button text-center align-items-center">
                        <button class="bg-warning rounded shadow-sm my-2 mx-2" style="height:60px;"><a href="insert_rooms.php" class="nav-link text-dark">Add New Room</a></button>
                        <button class="bg-warning rounded shadow-sm my-2 mx-2" style="height:60px;"><a href="admin-rooms.php" class="nav-link text-dark">View Rooms</a></button>
                        <button class="bg-warning rounded shadow-sm my-2 mx-2" style="height:60px;"><a href="admin-customers.php" class="nav-link text-dark">View Customers</a></button>
                        <button class="bg-warning rounded shadow-sm my-2 mx-2" style="height:60px;"><a href="admin-bookings.php" class="nav-link text-dark">View All Bookings</a></button>
                        <button class="bg-warning rounded shadow-sm my-2 mx-2" style="height:60px;"><a href="admin-payment.php" class="nav-link text-dark">View All Payments</a></button>
                </div>
        </div>
    </div>



    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>