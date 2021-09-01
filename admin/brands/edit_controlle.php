<?php



$stms = $con->prepare("SELECT * FROM `brands` WHERE Brand_ID = {$_GET['id']}");
$stms->execute();
$brand = $stms->fetch();

?>