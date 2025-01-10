<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Flex IT</title>
</head>
<body>
    <!-- ========= NAV ========== -->
    <div class="nav">
        <div class="nav-title"></div>
        <div class="nav-content">
            <a href="index.php">Home</a>
            <a href="index.php#service">Services</a>
            <a href="index.php#ourwork">Our Work</a>
            <a href="aboutus.php">About Us</a>
            <a href="contactus.php">Contact Us</a>
            <!-- <img class="nav-login-icon" src="../img/1.jpg" alt=""> -->
        </div>
        <div class="nav-last">
            <div class="nav-search">
                <input class="nav-search-input-txt" type="text" name="" id="" />
                <i class="fa-solid fa-magnifying-glass nav-search-icon"></i>

                <?php

                if (!isset($_SESSION['id'])) {
                    echo `<a href="login.php"><i class="fa-regular fa-circle-user nav-login-icon"></i></a>`;
                }
                else{
                    echo `<a href="profile.php"><img class="nav-login-icon" src="../img/1.jpg" alt=""></a>`;
                }

                ?>


                
            </div>
        </div>
    </div>
    <!-- ====== End of NAV ========= -->
</body>
</html>