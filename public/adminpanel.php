<?php
require('header.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="midsec-adminpanel">
        <div class="login-background">
            <div class="login-back-h">
                <h1>Adminpanel</h1>
            </div>
            <div class="login-back-a">
                <a href="./home.php">Home</a>
                <span>/</span>
                <a href="./login.php">Adminpanel</a>
            </div>
        </div>

        <div class="login-back-h1">
            <h1>Welcome back: <?php echo $_SESSION['username']; ?></h1>
        </div>
        <div class="adminpaneloptions">
            <a href="">Order history</a>
            <a href="./seestock.php">See stock</a>
            <a href="./addstock.php">Add stock</a>
            <a href="./users.php">See users</a>
        </div>
    </div>

    <div class="midsec_counter">
        <div class="midsec_usercount">
            <?php
            $conn = dbConnect();
            $sql = "SELECT COUNT(id) FROM users";
            $resultEnc = $conn->query($sql);
            $result = $resultEnc->fetch_all();
            ?>
            <h3>Users Count:</h3>
            <h4><?php echo $result[0][0]; ?></h4>
        </div>
    </div>

    <div class="midsec_counter">
        <div class="midsec_usercount">
            <?php
            $conn = dbConnect();
            $sql = "SELECT COUNT(id) FROM stock where type = 'redengine'";
            $resultEnc = $conn->query($sql);
            $result = $resultEnc->fetch_all();
            ?>
            <h3>Products Count:</h3><br>
            <h4>redENGINE</h4>
            <h4><?php echo $result[0][0]; ?></h4>
            <?php
            $conn = dbConnect();
            $sql = "SELECT COUNT(id) FROM stock where type = 'nexus'";
            $resultEnc2 = $conn->query($sql);
            $result2 = $resultEnc2->fetch_all();
            ?>
            <h4>Nexus</h4>
            <h4><?php echo $result2[0][0]; ?></h4>
            <?php
            $conn = dbConnect();
            $sql = "SELECT COUNT(id) FROM stock where type = 'absolute'";
            $resultEnc3 = $conn->query($sql);
            $result3 = $resultEnc3->fetch_all();
            ?>
            <h4>Absolute</h4>
            <h4><?php echo $result3[0][0]; ?></h4>
        </div>
    </div>

</body>

</html>


<?php
require('footer.php');
?>