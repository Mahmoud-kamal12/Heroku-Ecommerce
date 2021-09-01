<?php

function getTitle(){
    global $pageTitle ;

    return (isset($pageTitle)) ? $pageTitle :"Defualt"; 
}

function geterr($message){
    global $err ;
    if ($err == 0){
        return false;
    }elseif($err == 1){
        echo <<< ERORR
            <script>
                new Noty({
                    
                    type: 'error',
                    layout: 'topRight',
                    text: "{$message}",
                    timeout: 2000,
                    killer: true
                }).show();
            </script>
       ERORR;
    }elseif($err == 2){
        echo <<< ERORR
        <script>
            new Noty({
                type: 'success',
                
                layout: 'topRight',
                text: "{$message}",
                timeout: 2000,
                killer: true
            }).show();
        </script>
   ERORR;
    }
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



function printScript(){
    global $script ;

    return (isset($script)) ? $script :" "; 
}

function getImage($row){
    
    if ( $row['Product_Images'] !== "default.png" && $row['Product_Images'] !== NULL && $row['Product_Images'] !== "N;" && $images = unserialize($row['Product_Images'])) 
        return "admin/uploads/{$images[0]}"; 
    else
        return "admin/uploads/default.png";

}

function getAllImage($row){
    
    $images = unserialize($row['Product_Images']);
    return $images; 
}

function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}