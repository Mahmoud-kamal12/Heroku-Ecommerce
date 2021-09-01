<?php
    // Database 
    include "connect.php";
    // Route 
    $tpl = "includes/templates/";
    $func = "includes/functions/";
    $css = "layout/css/";
    $css = "layout/js/";
    
    // include important files

    include $func ."functions.php";
    include $tpl . "header.php";

    if (!isset($nonav)) {
        include $tpl . "Navbar.php";
    }