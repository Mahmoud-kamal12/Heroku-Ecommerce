<?php 

$stms = $con->prepare("DELETE FROM `options` WHERE Option_ID = {$_GET['id']}");
$stms->execute();


Noty("Deleted Success");
header("refresh:1;url=option.php");
?>