<?php



$stms = $con->prepare("SELECT * FROM `options_groups` WHERE Option_Group_ID = {$_GET['id']}");
$stms->execute();
$OptionsGroup = $stms->fetch();


?>