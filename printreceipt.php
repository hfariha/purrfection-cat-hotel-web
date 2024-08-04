<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purrfection Cat Hotel | Payment Receipt </title>
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
                <h1 class="navbar-brand mx-auto adminfont"><i class="fa-solid fa-book"></i> Purrfection Cat Hotel Booking Payment Receipt</h1>
                <div class="d-flex">
                    <a href="homepage.php" class="btn btn-outline-light shadow-none me-lg-2 me-3 w-40" style="font-size: 20px;"> Exit <i class="ms-2 fa-solid fa-right-from-bracket"></i></a>
                </div>
            </div>
        </nav>
    </div>

        <!-- Second part -->
    <div class="bg-light secondpadding-admin">
        <a href="custview_bookinglist.php" class="text-decoration-none"><h4 class="text-dark p-5 back-btn"><i class="fa-solid fa-arrow-left fa-lg me-2"></i>Back</h4>
        </a>
            <h3 class="text-center mb-4"><i class="fa-solid fa-cat"></i> Thank you for choosing us! <i class="fa-solid fa-paw"></i></h3>
            <h6 class="mt-1 text-muted text-center">*This is your payment receipt</h6>
    </div>

    <?php
    require('includes/connect.php');

    // Retrieve selected ID
    $selectedID = $_GET['id']; //get id from url located in bookinglist page

    // SQL query to retrieve data for the selected ID
    $sql = "SELECT *, cust_table.cust_fullname FROM booking INNER JOIN cust_table ON booking.cust_id=cust_table.cust_id WHERE bookingid = $selectedID";

    // Execute query
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // Loop through the result and fetch data based on bookingid
        while ($row = $result->fetch_assoc()) {
            $bookingid = $row['bookingid'];
            $checkin = $row['checkin'];
            $checkout = $row['checkout'];
            $cust_id = $row['cust_id'];
            $cust_fullname = $row['cust_fullname'];
            $room_id = $row['rooms_id'];
            $totalprice = $row['totalprice'];
            
            
        }

        // Display the retrieved receipt information
        echo "<div class='container w-60 m-auto rounded shadow-sm'>
        <div class='row'>
          <div class='col-md-6 offset-md-3'>
            <div class='card mt-5'>
              <div class='card-body'>
                    <h5 class='card-title text-center mb-4'>Payment Receipt for $cust_id : $cust_fullname</h5>
                    <p class='card-text'>Customer Name: $cust_fullname</p>
                    <p class='card-text'>Booking ID: $cust_id</p>
                    <p class='card-text'>Boarding Date: $checkin until $checkout</p>
                    <p class='card-text'>Booked Room ID: $room_id</p>
                    <p class='card-text'>Payment Amount: RM $totalprice.00</p>
                    <!-- Include other relevant data from the database -->
                    <hr>
                    <p class='card-text text-center'>Thank you for your payment.</p>
              </div>
            </div>
          </div>
        </div>
    </div>";
        
    } else {
        echo "No data found for the selected ID.";
    }
    ?>
    <div class='container d-flex align-items-center justify-content-center mt-5'>
        <button onclick='window.print()' class='btn btn-warning shadow-sm text-center w-30'>Print Receipt</button>
    </div>
    
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
