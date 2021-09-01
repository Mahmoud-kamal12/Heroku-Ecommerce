<?php 

try {

    $stms = $con->prepare("UPDATE `categories` SET `Category_Name` = ?, `Category_Desc` = ?, `Parent_Category` =? WHERE `categories`.`Cateory_ID` = ? ");

    $stms->execute([
        $_POST['Category_Name'],
        $_POST['Category_Desc'],
        $_POST['Parent_Category'],
        $_POST['Cateory_ID']
    ]);

    Noty("Updated Success");
    header("refresh:3;url=category.php");
    
} catch (\PDOException $e) {
    echo $e ;
}

?>