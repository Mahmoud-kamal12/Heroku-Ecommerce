<?php
session_start();
include "../admin/connect.php";
include "../includes/functions/functions.php";

if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {

        if ($_POST['User_Password'] !== $_POST['Confirm']) {

            $msg = "Confirm Password not the same Password";
            $page = "../register";
            header("Location:$page.php?err=1&msg={$msg}");
        }else{

            try {
                $sql = "INSERT INTO `users` (`User_ID`,`User_Name`, `User_Email`, `User_Password`, `User_Password_Hash`) VALUES (NULL, ?, ?, ? , ?)";
                $stms = $con->prepare($sql);
                $User_Password_Hash = sha1($_POST['User_Password']);
                $data = [
                    $_POST['User_Name'],
                    $_POST['User_Email'],
                    $_POST['User_Password'],
                    $User_Password_Hash,
                ];
                $stms->execute($data);

                $page = "../login";
                $msg = "User added successfuly";
                header("Location:$page.php?err=2&msg={$msg}");
    
            } catch (\PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    $msg = "This Email found in DB";
                    $page = "../register";
                    header("Location:$page.php?err=1&msg={$msg}");
                 } else {
                    $msg = $e->getMessage();
                    $page = "../register";
                    header("Location:$page.php?err=1&msg={$msg}");
                 }
            }
    
        }
}else{
    $page = "../register";
    header("Location:$page.php");
}


?>