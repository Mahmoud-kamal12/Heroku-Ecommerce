<?php


try {

    $stms = $con->prepare("INSERT INTO `options_groups`(`Option_Group_ID`, `Option_Group_Name`) VALUES (NULL,?)");
    $stms->execute([
        $_POST['Option_Group_Name'],
    ]);

    Noty("Added Success");
    header("refresh:1;url=optionsGroup.php");

} catch (PDOException $e) {
    Noty($e->getMessage() , 'error');
}

?>