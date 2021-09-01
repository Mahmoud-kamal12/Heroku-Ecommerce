<?php
session_start();

include "../admin/connect.php";
include "../includes/functions/functions.php";

if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {

    try {
        // $sql = "SELECT * FROM `users` WHERE User_Email = ? AND User_Password_Hash = ?";
        $stms = $con->prepare("SELECT * FROM `users` WHERE User_Email = ? AND User_Password_Hash = ?");
        $User_Password_Hash = sha1($_POST['User_Password']);
        
        $stms->execute([
            $_POST['User_Email'],
            $User_Password_Hash
        ]);
        $user = $stms->fetch();

        if ($user) {
            $_SESSION['ID'] = $user['User_ID'];
            $_SESSION['User_Name'] = $user['User_Name'];
            $page = "../index";
            $msg = "logedin successfuly";
            header("Location:$page.php?err=2&msg={$msg}");
        }else{
            $page = "../login";
            $msg = "User Not Found ";
            $err = 2;
            header("Location:$page.php?err={$err}&msg={$msg}");
        }

    } catch (\PDOException $e) {

        $msg = $e->getMessage();
        $page = "../login";
        header("Location:$page.php?err=1&msg={$msg}");
    }

}else{
    $page = "../login";
    header("Location:$page.php");
}



?>

