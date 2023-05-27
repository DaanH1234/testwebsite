<?php
require(__DIR__ . '/../config/config.php');
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'projectdb';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['email_login'], $_POST['password_login'])) {
    exit('Please fill both the username and password fields!');
}

if ($stmt = $con->prepare('SELECT id, password, type FROM users WHERE email = ?')) {
    $stmt->bind_param('s', $_POST['email_login']);
    $stmt->execute();
    $stmt->store_result();
}
?>

<?php
if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $password, $type);
    $stmt->fetch();
    if (password_verify($_POST['password_login'] . DB_SALT, $password)) {
        session_regenerate_id();
        $_SESSION['username'] = $_POST['email_login'];
        $_SESSION['id'] = $id;
        $_SESSION['type'] = $type;
        echo 'Welcome ' . $_SESSION['username'] . '!';
        if($_SESSION['type'] == -1)
        {
            header("Location: blacklistedip.php");
        }
        else{
            header("Location: home.php");
        }
    } else {
        echo 'Incorrect username and/or password!';
    }
} else {
    echo 'Incorrect username and/or password';
}
?>