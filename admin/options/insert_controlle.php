<?php


try {

    $stms = $con->prepare("INSERT INTO `options`(`Option_ID`, `Option_Name`, `Option_Option_Grouo_id`) VALUES (NULL,?,?)");
    $stms->execute([
        $_POST['Option_Name'],
        $_POST['Option_Option_Grouo_id'],
    ]);
    

    Noty("Added Success");
    header("refresh:1;url=option.php");

} catch (PDOException $e) {
    Noty($e->getMessage() , 'error');
    header("refresh:1;url=option.php");
}

?>