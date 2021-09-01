<?php 

try {

    $stms = $con->prepare("UPDATE `brands` SET `Brand_Name` = ?, `Brand_Desc` = ? WHERE Brand_ID = {$_POST['Brand_ID']} ");

    $stms->execute([
        $_POST['Brand_Name'],
        $_POST['Brand_Desc'],
    ]);

    Noty("Updated Success");
    header("refresh:3;url=brand.php");
    
} catch (\PDOException $e) {
    echo $e ;
}

?>