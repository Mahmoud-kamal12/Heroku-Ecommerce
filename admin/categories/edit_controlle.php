<?php

$stms = $con->prepare("SELECT * FROM `categories`");
$stms->execute();
$rows = $stms->fetchAll();

$stms = $con->prepare("SELECT * FROM `categories` WHERE Cateory_ID = {$_GET['id']}");
$stms->execute();
$row = $stms->fetch();

?>