<?php 

$stms = $con->prepare("DELETE FROM `options_groups` WHERE Option_Group_ID = {$_GET['id']}");
$stms->execute();

Noty("Deleted Success");
header("refresh:1;url=optionsGroup.php");
?>