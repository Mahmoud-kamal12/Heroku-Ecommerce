<?php

    $stms = $con->prepare("SELECT * FROM `categories` WHERE Parent_Category is null");
    $stms->execute();
    $rows = $stms->fetchAll();

?>