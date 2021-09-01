<?php 

    if (isset($_GET['pageno'])) {

        $pageno = $_GET['pageno'];

    } else {
        $pageno = 1;
    }

    $no_of_records_per_page = 10;
    
    $offset = ($pageno-1) * $no_of_records_per_page; 


    $supcat = "";

    if (isset($_GET['supcat'])) {
        
        $stms = $con->prepare("SELECT COUNT(*) as num FROM `categories` WHERE Parent_Category = {$_GET['supcat']} ");

        $stms->execute();
        $row = $stms->fetch(PDO::FETCH_ASSOC);
        $total_rows = $row['num'];
        
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        
        $stms = $con->prepare("SELECT ch.Cateory_ID as Cateory_ID , ch.Category_Name as `Category_Name` , ch.Category_Desc , ch.Parent_Category , pa.Category_Name as `Parent Name` FROM `categories` as ch 
        INNER JOIN
        `categories` as pa on ch.Parent_Category = pa.Cateory_ID
        WHERE pa.Cateory_ID = {$_GET['supcat']} LIMIT {$offset}, {$no_of_records_per_page} ");

    }else{

        $stms = $con->prepare("SELECT COUNT(*) as num FROM categories WHERE Parent_Category is null ");
        $stms->execute();
        $row = $stms->fetch(PDO::FETCH_ASSOC);
        $total_rows = $row['num'];
        
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        
        $stms = $con->prepare("SELECT * FROM categories WHERE Parent_Category is null LIMIT {$offset}, {$no_of_records_per_page}");
    }

    $stms->execute();
    $rows = $stms->fetchAll();



    



        
?>