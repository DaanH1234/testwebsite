<?php
require('./header.php');
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
    <div class="center-register">
        <form action="./register.php" method="post">

            <div class="login-background">
                <div class="login-back-h">
                    <h1>Register</h1>
                </div>
                <div class="login-back-a">
                    <a href="./home.php">Home</a>
                    <span>/</span>
                    <a href="./register.php">Register</a>
                </div>
            </div>

            <div class="register-midsec">
                <div class="register">
                    <div class="register-text">
                        <h1>Register</h1>
                    </div>
                </div>
                <div class="register-section">
                    <div class="login-lbl_boxes">
                        <label>Email adress:</label><span>*</span><br>
                        <input type="email" name="email_register" id=""><br>
                        <label>Username: </label><br>
                        <input type="text" name="username_register" id=""><br>
                        <label>Password:</label></label><span>*</span><br>
                        <input type="password" name="password_register" id=""><br>
                        <input type="submit" value="Register" class="login_btn" name="btn_register">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>


<?php

if (isset($_POST['btn_register'])) {
    $email = $_POST['email_register'];
    $name = $_POST['username_register'];
    $password = $_POST['password_register'];
    $type = 0;
    $ip = $_SERVER['REMOTE_ADDR'];

    $hashed_password = password_hash($password . DB_SALT, PASSWORD_DEFAULT);

    $conn = dbConnect();
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, type, ip) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $hashed_password, $type, $ip);
    $stmt->execute();
    $stmt->store_result();

    
    $webhookurl = "https://discord.com/api/webhooks/1107970904157327412/_-0MS_8dTgveqB_ElZwYE37Nb0DJZuIxlf4QwVUS5DxZqvfjVWkPh07mEdA2RGp6oqlL";
    $timestamp = date("c", strtotime("now"));
    
    $json_data = json_encode([
        "username" => "AGB999",
        "tts" => false,

    

        "embeds" => [
            [

                "title" => "New register",
                "type" => "rich",
                "description" => "A new user has been registered on agb999.xyz",
                "timestamp" => $timestamp,
                "color" => hexdec( "FF0000" ),
                "footer" => [
                    "text" => "AGB999",
                    "icon_url" => "https://p16-sign-useast2a.tiktokcdn.com/tos-useast2a-avt-0068-giso/2f259e6b94a768cac0f1d791269e0007~c5_100x100.jpeg?x-expires=1684407600&x-signature=2S9Q5fd15zeIPU8zRfAXAljZd4o%3D"
                ],
    
                "author" => [
                    "name" => "AGB999",
                ],
    
                "fields" => [

                    [
                        "name" => $name . " Has just registered",
                        "value" => '**'.$name.'**' . " Has just registerd on agb999.xyz",
                        "inline" => false
                    ],
                ]
            ]
        ]
    
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
    
    $ch = curl_init( $webhookurl );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    
    $response = curl_exec( $ch );
    curl_close( $ch );
}


require('./footer.php');
?>