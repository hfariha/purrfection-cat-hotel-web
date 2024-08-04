<?php
require('../includes/connect.php');

    // Form submission handling
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get room details from the form
        $rooms_name=$_POST['rooms_name'];
        $rooms_type=$_POST['rooms_type'];
        $rooms_capacity=$_POST['rooms_capacity'];
        $rooms_details=$_POST['rooms_details'];
        $rooms_price=$_POST['rooms_price'];
        $rooms_totalavailability=$_POST['rooms_totalavailability'];
        $rooms_img=$_FILES['rooms_img']['name'];
        $temproom_img=$_FILES['rooms_img']['tmp_name'];


        // Prepare the SQL statement
        $insert_rooms = "INSERT INTO room_table (rooms_name, rooms_type, rooms_capacity, rooms_details, rooms_price, rooms_img,rooms_totalavailability) VALUES ('$rooms_name', '$rooms_type', '$rooms_capacity', '$rooms_details', '$rooms_price','$rooms_img', '$rooms_totalavailability')";

        // Execute the query            
        if ( empty($rooms_name) || empty($rooms_type) || empty($rooms_capacity) || empty($rooms_details) || empty($rooms_price) || empty($rooms_img) || empty($rooms_totalavailability)) {
            echo "<script>alert('Please fill all the fields.');</script>";
            exit();
        } else if ($connection->query($insert_rooms) === TRUE) {
            move_uploaded_file($temproom_img,"./room_images/$rooms_img");
            header('location:admin-rooms.php');
            
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
            background-image: url('../img/addnewroombg.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body class="bg-light">
<!-- back to admin dashboard -->
<a href="index.php" class="text-decoration-none"><h4 class="text-dark p-5 back-btn"><i class="fa-solid fa-arrow-left fa-lg me-2"></i>Back</h4>
</a>

<div class="container mt-5">
    <h1 class="text-center mb-3">Add New Rooms</h1>
    <!-- from to insert room -->
    <div class="container bg-warning w-50 m-auto rounded shadow-sm">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data" class="m-3 p-2">
            <label for="room-name" class="form-label" style="font-weight:600; font-size:21px;">Room Name</label>
            <div class="input-group form-outline mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-signature"></i></span>
                <input type="text" required name="rooms_name" autocomplete="off" id="rooms_name" class="form-control" placeholder="Enter Room Name">
            </div>
            <label for="room-type" class="form-label" style="font-weight:600; font-size:21px;">Room Type</label>
            <div class="input-group form-outline mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-signature"></i></span>
                <input type="text" required name="rooms_type" autocomplete="off" id="rooms_type" class="form-control" placeholder="Enter Room Type">
            </div>
            <label for="room-capacity" class="form-label" style="font-weight:600; font-size:21px;">Room Capacity</label>
            <div class="input-group form-outline mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-cat"></i></span>
                <input type="text" required name="rooms_capacity" autocomplete="off" id="rooms_capacity" class="form-control" placeholder="Enter Room Capacity">
            </div>
            <label for="room-details" class="form-label" style="font-weight:600; font-size:21px;">Room Details</label>
            <div class="input-group form-outline mb-4" style="height:100px;">
                <span class="input-group-text">Room Details</span>
                <textarea name="rooms_details" required id="rooms_details" class="form-control" aria-label="With textarea"></textarea>
            </div>
            <label for="room-img" class="form-label" style="font-weight:600; font-size:21px;">Room Image</label>
            <div class="input-group form-outline mb-4">
                <input type="file" required name="rooms_img" autocomplete="off" id="rooms_img" class="form-control">
            </div>
            <label for="room-price" class="form-label" style="font-weight:600; font-size:21px;">Room Price</label>
            <div class="input-group form-outline mb-4">
                <span class="input-group-text" id="basic-addon1">RM</span>
                <input type="text" required name="rooms_price" autocomplete="off" id="rooms_price" class="form-control" placeholder="Enter Room Price">
            </div>
            <label for="room-totalavailability" class="form-label" style="font-weight:600; font-size:21px;">Total Room Available</label>
            <div class="input-group form-outline mb-4">
                <span class="input-group-text" id="basic-addon1">Available Rooms</span>
                <input type="text" required name="rooms_totalavailability" autocomplete="off" id="rooms_totalavailability" class="form-control" placeholder="Enter Total Room Available">
            </div>
            <!-- button save -->
            <div class="input-group form-outline mb-4">
                <input type="submit" name="insert_room" id="insert_room" class="btn btn-dark p-3 m-auto mt-4" value="   Save   ">
            </div>
        </form>
    </div>
</div>



    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>


