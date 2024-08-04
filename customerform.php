<?php
require('includes/connect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get room details from the form
        $cust_fullname=$_POST['cust_fullname'];
        $cust_email=$_POST['cust_email'];
        $cust_phonenum=$_POST['cust_phonenum'];
        $cust_totalcat=$_POST['cust_totalcat'];

        // Prepare the SQL statement
        $insertcust = "INSERT INTO cust_table (cust_fullname, cust_email, cust_phonenum, cust_totalcat) VALUES ('$cust_fullname','$cust_email', '$cust_phonenum', '$cust_totalcat')";

        // Execute the query            
        if ( empty($cust_fullname) || empty($cust_email) || empty($cust_phonenum) || empty($cust_totalcat)) {
            echo "<script>alert('Please fill all the fields.');</script>";
            header("Location: customerform.php");
            exit();
        } else if ($connection->query($insertcust) === TRUE) {
            echo "<script>alert('Your data has been saved successfully')</script>";
            header("Location: booking-form1.php");
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Form Details</title>
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
<body class="bg-light">
<!-- back to admin dashboard -->
<a href="homepage.php" class="text-decoration-none"><h4 class="text-dark p-5 back-btn"><i class="fa-solid fa-arrow-left fa-lg me-2"></i>Back</h4>
</a>

<div class="container mt-5">
    <h1 class="text-center mb-3">Customer Info form</h1>
    <!-- from to insert room -->
    <div class="container bg-warning w-50 m-auto rounded shadow-sm">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data" class="m-3 p-2">
            
            <label for="full-custname" class="form-label" style="font-weight:600; font-size:21px;">Full Name</label>
            <div class="input-group form-outline mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-signature"></i></span>
                <input required type="text" name="cust_fullname" id="cust_fullname" class="form-control" placeholder="Enter Your Full Name">
            </div>
            <label for="email-cust" class="form-label" style="font-weight:600; font-size:21px;">Email</label>
            <div class="input-group form-outline mb-4">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input required type="text" name="cust_email" id="cust_email" class="form-control" placeholder="Enter Your Email Address">
            </div>
            <label for="phone-cust" class="form-label" style="font-weight:600; font-size:21px;">Phone Number</label>
            <div class="input-group form-outline mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-signature"></i></span>
                <input required type="text" name="cust_phonenum" id="cust_phonenum" class="form-control" placeholder="Enter Your Phone Number">
            </div>
            <label for="totalcat-cust" class="form-label" style="font-weight:600; font-size:21px;">Total Cats</label>
            <div class="input-group form-outline mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-cat"></i></span>
                <input required type="text" name="cust_totalcat" id="cust_totalcat" class="form-control" placeholder="Enter Total Cats">
            </div>
            <div class="input-group form-outline mb-4">
                <input required type="submit" name="insert_cust" id="insert_cust" class="btn btn-dark p-3 m-auto mt-4" value="  Next   ">
            </div>
        </form>
    </div>
</div>



    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>