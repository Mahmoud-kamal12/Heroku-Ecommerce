<?php

$stms = $con->prepare("SELECT * FROM `options_groups` WHERE 1");
$stms->execute();
$Options = $stms->fetchAll();

$stms = $con->prepare("SELECT * FROM `options` WHERE Option_ID ={$_GET['id']} ");
$stms->execute();
$ids = $stms->fetch();



?>