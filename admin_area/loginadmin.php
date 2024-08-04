
<?php
        require('../includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
    <!-- swiper js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            overflow: hidden;
        }

        div.loginform{
            position: absolute;
            width: 450px;
            height: auto;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }

        .back-btn{
            text-decoration: none;
            cursor: pointer;
        }



    </style>
</head>
<body class="bg-dark">
    <!-- back to mainpage -->
    <!-- figure out how to turn to previous page!! -->
    <h4 onclick="history.back()" class="text-white p-5 back-btn"><i class="fa-solid fa-arrow-left fa-lg me-2"></i>Back</h4>

    <div class="loginform text-center rounded bg-warning shadow overflow">
        <!-- method "POST" is used to send data to server -->
        <form  name="form" action="loginlogic.php" method="POST"> 
            <i class="fa-solid fa-user p-5 fa-4x"></i>
            <h3>Admin Login</h3>
            <div class="p-5">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user fa-lg"></i></span>
                    <input name="admin_uname" required autocomplete="off" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-key fa-lg"></i></span>
                    <input name="admin_pw" required type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
        
                </div>
                <button name="login" type="submit" class="btn text-center btn-outline-dark shadow-sm p-2">LOGIN</button>
            </div>
        </form>
    </div>

    <!-- call code that connect php and mysql -->
    
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    
</body>
</html>