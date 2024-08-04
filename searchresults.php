<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boarding Rooms</title>
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
    <!-- swiper js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }

        .logo{
            width: 5%;
            height: 5%;
        }

        .height-btn{
            height: 50px;
            font-size: 25px;
        }


    </style>
</head>
<body>
     <!-- nav bar -->
    <nav  class="navbar navbar-expand-lg bg-warning px-lg-3 py-lg-3 shadow-sm sticky-top">
        <div class="container-fluid">
            <img src="./img/logohotelcat.png" alt="" class="logo me-2" href="homepage.php">
            <a href="homepage.php" class="navbar-brand me-5 fw-bold fs-3">Purrfection Cat Hotel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link me-2" href="homepage.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active me-2" aria-current="page" href="#">Rooms</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2" href="#">About Us</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <br><br>
    <h3 class="text-center m-auto mb-4" style="font-weight:600; font-size:45px">Available Rooms</h3>
    <div class="container">
        <div class="row">
            <?php
            require('includes/connect.php');

                //Retrieve check in check out date from the form 
                if (isset($_POST['Search-avail'])) {
                    $checkin = $_POST['checkin'];
                $checkout = $_POST['checkout'];
                $rooms_capacity = $_POST['totalcats'];


                //Check if check in date is greater than check out date
                if($checkin < $checkout)
                {
                    $query = "SELECT * FROM room_table WHERE rooms_totalavailability > 0 AND rooms_capacity = '$rooms_capacity'";

                    $result = mysqli_query($connection, $query);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $rooms_id=$row['rooms_id'];
                            $rooms_name=$row['rooms_name'];
                            $rooms_type=$row['rooms_type'];
                            $rooms_capacity=$row['rooms_capacity'];
                            $rooms_details=$row['rooms_details'];
                            $rooms_img=$row['rooms_img'];
                            $rooms_price=$row['rooms_price'];
                            $rooms_availability=$row['rooms_totalavailability'];
                            echo "<div class='col-lg-12 col-md-12 px-4 shadow mb-4'>
                            <!-- card room section -->
                            <div class='card mb-4 border-0 shadow'> 
                                <div class='row g-0 p-3 align-items-center'>
                                    <div class='col-md-6'>
                                        <img src='./admin_area/room_images/$rooms_img' class='img-fluid rounded-start' alt='...'>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='card-body'>
                                            <h5 class='card-title'> $rooms_name </h5>
                                            <p class='card-text'> Room Type : $rooms_type </p>
                                            <p class='card-text'>$rooms_details</p>
                                            <p class='card-text'>For $rooms_capacity</p>
                                            <p class='card-text'>Availability : $rooms_availability</p>
                                        </div>
                                    </div>
                                    <div class='col-md-2'>
                                        <h6>Price : RM $rooms_price.00 per night</h6>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <br><br><br>
                            <!-- button book now -->
                            <div class='input-group form-outline mb-4'>
                                <a href='fullbookform.php' id='booknow' class='btn btn-sm text-center height-btn bg-warning shadow-sm mb-2 w-100'> Book Now </a>
                            </div>";
                
                        }
                    }
                    else{
                        echo "<br><br>
                        <h3 class='text-center mt-5'>Sorry, there are no available rooms</h3>";
                    }
                    
                }else{

                    echo "<br><br>
                        <h3 class='text-center mt-5 mb-5'>Check In date cannot be greater than Check Out date</h3>
                        <br><br><br>
                            <!-- button book now -->
                            <div class='input-group form-outline mb-4'>
                                <a href='homepage.php' id='booknow' class='btn btn-sm text-center height-btn bg-warning shadow-sm mb-2 w-100'> Back to homepage </a>
                            </div>";
                }
                    
                
                }
                
            ?>
        </div>
        
        
    </div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>
</html>