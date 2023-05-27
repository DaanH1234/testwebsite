<?php
$conn = dbConnect();
$sql = "SELECT ip FROM blacklistedip";
$resultEnc = $conn->query($sql);
$result = $resultEnc->fetch_all();


$blacklisted = $result;
$ip = $_SERVER['REMOTE_ADDR'];

if ($ip == $blacklisted) {
    header("Location: blacklistedip.php");
}
