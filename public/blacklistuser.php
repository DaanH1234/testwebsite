<?php
session_start();
require(__DIR__ . '/../src/database.php');

$username = $_POST['username'];

$type = $_POST['type'];
if($_SESSION['type'] == 2)
{
  if($type == 2)
  {
    echo "You cant blacklist the owner!" . "<br>" . "But nice try!";
  }
  else{

    if (isset($_POST['blacklistbtn'])) {
      $id = $_POST['blacklist'];
  
      $conn = dbConnect();
      $sql = "UPDATE users SET type = -1 WHERE id = '$id'";
      $result = $conn->query($sql);
      header("Location: users.php");

      $webhookurl = "https://discord.com/api/webhooks/1107970904157327412/_-0MS_8dTgveqB_ElZwYE37Nb0DJZuIxlf4QwVUS5DxZqvfjVWkPh07mEdA2RGp6oqlL";
      $timestamp = date("c", strtotime("now"));
      
      $json_data = json_encode([
          "username" => "AGB999",
          "tts" => false,
      

          "embeds" => [
              [

                  "title" => "New blacklist",
                  "type" => "rich",
                  "description" => "A new user has been blacklisted on agb999.xyz",
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
                          "name" => $username . " Has been blacklisted!\n",
                          "value" => "User blacklisted: " . '**'.$username.'**' . "\n" . "Blacklisted by: " . '**'.$_SESSION['username'].'**',
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

  }
}
else{
  header("Location: errorremove.php");
}
