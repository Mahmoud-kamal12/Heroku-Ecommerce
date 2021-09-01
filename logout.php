<?php
    session_start();
    
    unset($_SESSION['ID']);
    unset($_SESSION['User_Name']);

    header('Location: login.php');
    
    
