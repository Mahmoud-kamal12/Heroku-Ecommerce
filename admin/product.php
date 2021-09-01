<?php 

// $nonav="";

ob_start();

session_start();

if (isset($_SESSION['Admin_ID'])) {
    
    $pageTitle = "Products";
    
    include "init.php";

    include $tpl . "upperSearch.php";

    $do = (isset($_GET['do']))? $_GET['do']:'index';

    if ($do == "index") { 
        
        // start php code 
        include "products/index_controlle.php";
        // end php code 


        // start html code 
        include "products/index_view.php";
        // end html code


}elseif ($do == "Add") {
    


        // start php code 
        include "products/add_controlle.php";
        // end php code 

        // Start html code
        include "products/add_view.php";
        // End Add html code


}elseif ($do == "Insert") {
    
        // start php code 
        include "products/insert_controlle.php";
        // end php code 


    }elseif($do == "Edit"){ 

        // start php code 
        include "products/edit_controlle.php";
        // end php code 

        // Start html code
        include "products/edit_view.php";
        // End html code


}elseif($do == "Update"){

        // start php code 
        include "products/update_controlle.php";
        // end php code 

}elseif ($do == "Delete") {

            // start php code 
            include "products/delete_controlle.php";
            // end php code 
}

    include $tpl . "footer.php";
    
}else{

    header('Location: index.php');
    exit();
}

ob_end_flush();


?>