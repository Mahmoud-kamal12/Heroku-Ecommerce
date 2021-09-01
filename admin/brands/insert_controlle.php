<?php


try {
    $stms = $con->prepare("INSERT INTO `brands`(`Brand_ID`, `Brand_Name`, `Brand_Desc`) VALUES (NULL,?,?)");
    $stms->execute([
        $_POST['Brand_Name'],
        $_POST['Brand_Desc'],

    ]);

    Noty("Added Success");
    header("refresh:1;url=brand.php");

} catch (PDOException $e) {
    Noty($e->getMessage() , 'error');
    header("refresh:1;url=brand.php");
}

?>