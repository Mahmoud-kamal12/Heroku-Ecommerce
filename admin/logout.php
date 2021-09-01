<?php
    session_start();

    unset($_SESSION['Admin_ID']);
    unset($_SESSION['Admin_User_Email']);
    unset($_SESSION['Admin_User_Name']);
    echo $_SESSION['Admin_ID'];
    header('Location: index.php');
    
    
