<?php

    $stms = $con->prepare("SELECT * FROM `options_groups` WHERE 1");
    $stms->execute();
    $Options = $stms->fetchAll();
?>