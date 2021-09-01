<?php 

$stms = $con->prepare("DELETE FROM `brands` WHERE Brand_ID = {$_GET['id']}");
$stms->execute();

Noty("Deleted Success");
header("refresh:1;url=brand.php");
?>