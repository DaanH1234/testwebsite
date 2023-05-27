<?php
require('header.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="center">
        <form action="check.php" method="post">

            <div class="login-background">
                <div class="login-back-h">
                    <h1>Login</h1>
                </div>
                <div class="login-back-a">
                    <a href="./home.php">Home</a>
                    <span>/</span>
                    <a href="./login.php">Login</a>
                </div>
            </div>


            <div class="checklog">
                <div class="loginbox">
                    <div class="loginbox-back">
                        <h1>Login</h1>
                    </div>
                    <div class="login-lbl_boxes">
                        <label>Username or email adress:</label><span>*</span><br>
                        <input type="text" name="email_login" id=""><br>
                        <label>Password:</label></label><span>*</span><br>
                        <input type="password" name="password_login" id=""><br>
                        <input type="submit" value="Login" class="login_btn">
                    </div>
                    <div class="forgot_pass">
                        <a href="">Forgot your password?</a>
                    </div>
                </div>

        </form>
        <div class="no_account_r">
            <h1>No account?</h1>
            <p>Click here to register</p>
            <a class="register_btn" href="./register.php">Register</a>
        </div>
    </div>


    </div>
</body>

</html>

<?php





?>


<?php
require('footer.php');
?>