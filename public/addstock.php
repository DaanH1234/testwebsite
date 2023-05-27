<?php
require('./header.php');

if ($_SESSION['type'] != 2) {
    header("Location: stocknoowner.php");
} else {


?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>


        <div class="login-background">
            <div class="login-back-h">
                <h1>Add Stock</h1>
            </div>
            <div class="login-back-a">
                <a href="./home.php">Home</a>
                <span>/</span>
                <a href="./adminpanel.php">Add stock</a>
            </div>
        </div>


    </body>

    </html>



<?php
}
require('./footer.php');
?>