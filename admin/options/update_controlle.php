<?php 

try {

    $stms = $con->prepare("UPDATE `options` SET `Option_Name` = ?, `Option_Option_Grouo_id` = ? WHERE Option_ID = {$_POST['Option_ID']} ");

    $stms->execute([
        $_POST['Option_Name'],
        $_POST['Option_Option_Grouo_id'],
    ]);

    Noty("Updated Success");
    header("refresh:1;url=option.php");
    
} catch (\PDOException $e) {
    echo $e ;
}

?>