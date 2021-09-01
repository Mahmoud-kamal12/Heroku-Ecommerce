<?php

require_once '../vendor/autoload.php';

include '../admin/connect.php';

include "google-config.php";

session_start();

if (isset($_GET['code'])) {
  
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

  if (!isset($token['error'])) {
   echo $_GET['code'];
  $client->setAccessToken($token);
  $google_oauth = new Google_Service_Oauth2($client);
  $userData = $google_oauth->userinfo->get();

  $sql = "SELECT * FROM `users` WHERE User_Email = ?";
  $stms = $con->prepare($sql);
  $stms->execute([$userData->email]);
  $user = $stms->fetch();


  if ($user) {

    $_SESSION['ID'] = $user['User_ID'];
    $_SESSION['User_Name'] = $user['User_Name'];

  }else{

    $sql = "INSERT INTO `users` (`User_ID`,`User_Name`, `User_Email`, `User_Password`, `User_Password_Hash` , `User_Token`) VALUES (NULL, ?, ?, ? , ? ,?)";
    $stms = $con->prepare($sql);  
    $data = [
        $google_oauth->userinfo->get()->name,
        $google_oauth->userinfo->get()->email,
        NULL,
        NULL,
        $token['access_token']
    ];
    $stms->execute($data);
    $last_id = $con->lastInsertId();
    $_SESSION['ID'] = $last_id;
    $_SESSION['User_Name'] = $google_oauth->userinfo->get()->email;
  }

  $page = "../index";
  $msg = "Logedin successfuly";
  header("Location:$page.php?err=2&msg={$msg}");
    
  }
}

?>
