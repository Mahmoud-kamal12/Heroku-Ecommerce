<?php

function getTitle(){
    global $pageTitle ;

    return (isset($pageTitle)) ? $pageTitle :"Defualt"; 
}

function RedirectError($message , $second = 3 , $page)
{
    echo <<< ERORR
        <script>
            new Noty({
                // type: 'success',
                type: 'error',
                layout: 'topRight',
                text: 'Some notification text',
                timeout: 2000,
                killer: true
            }).show();
        </script>
    ERORR;

    echo <<< ERORR
        <div class="alert alert-info" role="alert">
            This Message will hide after {$second} second and you will redirect
        </div>
    ERORR;  

    header("refresh:$second;url=$page.php");
}

function RedirectSuccess($message , $second = 3 , $page)
{
    echo <<< ERORR
        <div class="alert alert-success" role="alert">
            {$message}
        </div>
    ERORR;

    echo <<< ERORR
        <div class="alert alert-info" role="alert">
            This Message will hide after {$second} second and you will redirect
        </div>
    ERORR;  

    header("refresh:$second;url=$page.php");
}

function getError($e){
    $error = explode( ' ', explode( ':', $e->getMessage())[2] , 3)[2];
    return $error;
}

function CountColumn($table , $where = '1', $and = ''){
    global $con;
    $stms2 = $con->prepare("SELECT COUNT(*) FROM `{$table}` WHERE {$where} {$and}");
    $stms2->execute();
    return $stms2->fetchColumn();

}

function getLatest($table , $where, $and = ''){
    global $con;
    $stms2 = $con->prepare("SELECT * FROM `{$table}` WHERE {$where} ORDER BY ID DESC {$and} ");
    $stms2->execute();
    $rows = $stms2->fetchAll();
    return $rows;
}
function Noty($message , $type = 'success'){

    echo <<< ERORR
    <script type="text/javascript">
            new Noty({
                type : '{$type}',
                text: '{$message}',
                layout: 'topRight',
                timeout:1000,
                progressBar:true,
                killer:true,
            }).show();
        </script>

    ERORR;  

}

function uploadFile($Images){

    $target_dir = "uploads/";
    $myArray = array();
    
    for($i = 0; $i < count($Images['name']); $i++){
        $name =  hash('ripemd160', basename($Images["name"][$i]). time() . $_SESSION['Admin_User_Name']). basename($Images["name"][$i]);
        $target_file = $target_dir . $name;
        move_uploaded_file($Images["tmp_name"][$i], $target_file);
        
        array_push($myArray , $name);
    }
    $e = serialize($myArray);
    

    return $e;
}

function deletFile($Images){

    for($i = 0; $i < count($Images); $i++){
        if (file_exists("uploads/".$Images[$i]) && $Images[$i]!= 'default.png') {
            unlink("uploads/".$Images[$i]);
        }
    }

}

function getImage($row){
    
    if ( $row['Product_Images'] !== "default.png" && $row['Product_Images'] !== NULL && $row['Product_Images'] !== "N;" && $images = unserialize($row['Product_Images'])) 
        return "uploads/{$images[0]}"; 
    else
        return "uploads/default.png";

}

function getFullName($row){
    return ucfirst($row['Order_First_Name'])  ." " . ucfirst($row['Order_Last_Name']);
}