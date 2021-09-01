<?php

$stms = $con->prepare("INSERT INTO `categories` (`Cateory_ID`, `Category_Name`, `Category_Desc`, `Parent_Category`) VALUES (NULL, '{$_POST['Category_Name']}', '{$_POST['Category_Desc']}', {$_POST['Parent_Category']});");
$stms->execute();

Noty("Added Success");
header("refresh:1;url=category.php");
?>