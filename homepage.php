<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purrfection Cat Hotel</title>
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

        /* to let availability form overlap the header banner */
        .availroom-form{
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        /* when screen is minimized */
        @media screen and (max-width: 575px) {
            .availroom-form{
                margin-top: 25px;
                padding: 0 35px;
            }

        }

        welcome-section{
            margin-top: 200px;
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
                <a class="nav-link active me-2" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2" href="#">About Us</a>
                </li>
            </ul>
            <div class="d-flex">
                <button onclick="window.location.href = 'admin_area/loginadmin.php'" class="btn btn-outline-dark shadow-none me-lg-2 me-3" type="button">Admin Login</button>
            </div>
            </div>
        </div>
    </nav>

    <!-- cat hotel pics swiper -->
    <div class="container-fluid">
        <!-- Swiper -->
        <div class="swiper mySwiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="img/slidermain.png" class="w-100 d-block h-10">
                </div>
                <div class="swiper-slide">
                    <img src="img/slidertry2.jpg" class="w-100 d-block h-10">
                </div>
                <div class="swiper-slide">
                    <img src="img/slidertry2.jpg" class="w-100 d-block h-10">
                </div>
                <div class="swiper-slide">
                    <img src="img/slidertry2.jpeg" class="w-100 d-block h-10">
                </div>
            </div>
        </div>
    </div>

    <!-- Form Checking Room Availability -->
    <div class="container availroom-form">
        <div class="row">
            <div class="col-lg-13 bg-light shadow p-4 rounded">
                <h5>Check Room Availability</h5>
                <form action="searchresults.php" method="POST">
                    <div class="row pt-2 align-items-end">
                        <div class="col-lg-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check In</label>
                            <input type="date" id="checkin" name="checkin" required class="form-control shadow-none">
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check Out</label>
                            <input type="date" id="checkout" name="checkout" required class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Total Cats:</label>
                            <!-- <input type="text" id="totalcats" name="totalcats" required class="form-control shadow-none"> -->
                            <select name="totalcats" id="totalcats"class='form-control shadow-none' required>
                            <option value="">Choose total cats<i class="fa-solid fa-chevron-down"></i></option>
                            <?php
                            require('includes/connect.php');

                            $select_query = "SELECT * FROM room_table";
                            $result_query=mysqli_query($connection,$select_query);
            
                            while($row=mysqli_fetch_assoc($result_query)){
                                $rooms_capacity=$row['rooms_capacity'];
                                
                                echo "<option value='$rooms_capacity' id='totalcats' name='totalcats'>$rooms_capacity</option>";
                            }
                            ?>
                        </select>
                            
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                        <button name="Search-avail" type="submit" class="btn text-center btn-warning shadow-sm p-2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Rooms Preview  -->
    <br><br>
    <h1 class="text-center mt-5 welcome-section"> Welcome to Purrfection Premium Cat Hotel  </h1>
    <br>
    <!-- Contact Us -->
    <br><br>
    <div class="container">
        <h4 class="mt-5" style="font-size: 30px">Purrfection Premium Cat Rooms</h4>
    </div>
    <!-- Rooms Preview  -->
    <div class="container rooms-prev">
        <div class="row">
        <?php
            require('includes/connect.php');
            // require('functions/commonfunction.php');
            $select_query = "SELECT * FROM room_table order by rand()";
            $result_query=mysqli_query($connection,$select_query);
            // echo $row['room_name'];
            while($row=mysqli_fetch_assoc($result_query)){
                $rooms_id=$row['rooms_id'];
                $rooms_name=$row['rooms_name'];
                $rooms_type=$row['rooms_type'];
                $rooms_capacity=$row['rooms_capacity'];
                $rooms_details=$row['rooms_details'];
                $rooms_img=$row['rooms_img'];
                $rooms_price=$row['rooms_price'];
                $rooms_availability=$row['rooms_totalavailability'];
                echo "<div class='col-lg-4 col-md-6 my-3'>
                <div class='card border-2 shadow' style='max-width: 360px; margin:auto'>
                    <img src='./admin_area/room_images/$rooms_img' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$rooms_name</h5>
                        <h6>RM $rooms_price.00 per night</h6>
                        <div class='features mb-4'>
                            <h6 class='mb-1'>
                                Details
                            </h6>
                            <span class='badge rounded-pill text-dark bg-light text-wrap'>Maximum $rooms_capacity per room</span>
                            <span class='badge rounded-pill text-dark bg-light'>$rooms_type</span>
                            <span class='badge rounded-pill text-dark bg-light text-wrap'>$rooms_details</span>
                        </div>
                    </div>
                </div>
            </div>";
            }
        ?>
            
            <div class="col-lg-12 text-center mt-2">
                <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded fw-bold shadow-none p-3" style="font-size: 18px;">View More Rooms <i class="fa-solid fa-circle-chevron-right fa-lg ms-2"></i></a>
            </div>
            <br><br><br><br><br>
        </div>
    </div>

    <footer class="bg-dark text-center text-white">
        
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-facebook-f"></i
            ></a>
            <!-- Google -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-google"></i
            ></a>
            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-instagram"></i
            ></a>
            <!-- Tiktok -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-tiktok"></i
            ></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright: Purrfection Cat Hotel
        </div>
        <!-- Copyright -->
    </footer>

    <!--  -->


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper-container", {
        spaceBetween: 30,
        effect: "fade",
        });
    </script>
</body>
</html>