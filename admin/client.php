<?php 

// $nonav="";
// $pageTitle = "Login";

ob_start();

session_start();

if (isset($_SESSION['Admin_ID'])) {
    
    $pageTitle = "Client";
    
    include "init.php";

    include $tpl . "upperSearch.php";

    $do = (isset($_GET['do'])) ? $_GET['do']:'index';

    if ($do == "index") { 
        
        // start php code 
        include "clients/index_controlle.php";
        // end php code 


        // start html code 
        include "clients/index_view.php";
        // end html code
        
    }

    include $tpl . "footer.php";
    
}else{

    header('Location: index.php');
    exit();
}

ob_end_flush();


?>