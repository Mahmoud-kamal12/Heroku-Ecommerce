<?php 

try {

    $stms = $con->prepare("UPDATE `options_groups` SET `Option_Group_Name` =? WHERE Option_Group_ID = {$_POST['Option_Group_ID']} ");

    $stms->execute([
        $_POST['Option_Group_Name'],
    ]);

    Noty("Updated Success");
    header("refresh:1;url=optionsGroup.php");
    
} catch (\PDOException $e) {
    echo $e ;
}

?>