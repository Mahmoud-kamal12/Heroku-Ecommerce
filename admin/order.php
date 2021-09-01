<?php 

// $nonav="";

ob_start();

session_start();

if (isset($_SESSION['Admin_ID'])) {
    
    $pageTitle = "Orders";
    
    include "init.php";

    include $tpl . "upperSearch.php";

    $do = (isset($_GET['do']))? $_GET['do']:'index';

if ($do == "index") { 
        
        // start php code 
        include "orders/index_controlle.php";
        // end php code 


        // start html code 
        include "orders/index_view.php";
        // end html code



}elseif($do == "Show"){ 

    // start php code 
    include "orders/show-controller.php";
    // end php code 

    // Start html code
    include "orders/show-view.php";
    // End html code


}elseif($do == "Update"){

        // start php code 
        include "orders/update_controlle.php";
        // end php code 

}elseif ($do == "Delete") {

            // start php code 
            include "orders/delete_controlle.php";
            // end php code 
}

    include $tpl . "footer.php";
    
}else{

    header('Location: index.php');
    exit();
}

ob_end_flush();


?>