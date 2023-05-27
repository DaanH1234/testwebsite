<?php
require(__DIR__ . '/../src/database.php');
require('blacklist.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="redENGINE reseller, Fast services, Trustable, Nexus, redENGINE, Absolute, PayPal, Tikkie, Crypto">
    <title>AGB999</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="./jss/script.js"></script>
</head>

<body style="background-color:#202020; font-family: Poppins !important;">
    <header>
        <div class="top-header" style="padding-top: 20px !important;">
            <p>PayPal is currently only available in discord tickets</p>
            <h3 id="dissapear">X</h3>
        </div>

        <div class="welcome-page-header">
            <div class="welcome-page-header-image">
                <img src="./images/TRANSPARENT.png" alt="">
                <button id="hamburger-button">&#9776; Menu</button>
            </div>
            <div class="welcome-page-header-products">
                <a href="./home.php">Home</a>
                <a href="./products.php">Shop</a>
                <a href="./faq.php">FAQ</a>
                <a href="./aboutus.php">About us</a>
                <button type="button"  data-toggle="modal" data-target="#cart">Cart <span class="total-count"></span></button>
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<a href=./myaccount.php>My account</a>";
                }
                ?>
            </div>
            <div class="welcome-page-header-discord">
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<a href=logout.php>Logout</a>";
                } else {
                    echo "<a href=./login.php>Login</a>";
                }
                if(isset($_SESSION['username']))
                {
                    if($_SESSION['type'] >= 1)
                    {
                        echo "<a href=./adminpanel.php>Admin panel</a>";
                    }
                }
                ?>
                <a href="">Discord</a>
            </div>
        </div>

    </header>
</body>

</html>