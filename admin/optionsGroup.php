<?php 

// $nonav="";

ob_start();

session_start();

if (isset($_SESSION['Admin_ID'])) {
    
    $pageTitle = "Options Groups";
    
    include "init.php";

    include $tpl . "upperSearch.php";

    $do = (isset($_GET['do']))? $_GET['do']:'index';

    if ($do == "index") { 
        
        // start php code 
        include "optionsGroup/index_controlle.php";
        // end php code 


        // start html code 
        include "optionsGroup/index_view.php";
        // end html code


}elseif ($do == "Insert") {
    
        // start php code 
        include "optionsGroup/insert_controlle.php";
        // end php code 


}elseif($do == "Edit"){ 

        // start php code 
        include "optionsGroup/edit_controlle.php";
        // end php code 

        // Start html code
        include "optionsGroup/edit_view.php";
        // End html code


}elseif($do == "Update"){

        // start php code 
        include "optionsGroup/update_controlle.php";
        // end php code 

}elseif ($do == "Delete") {

            // start php code 
            include "optionsGroup/delete_controlle.php";
            // end php code 
}

    include $tpl . "footer.php";
    
}else{

    header('Location: index.php');
    exit();
}

ob_end_flush();


?>