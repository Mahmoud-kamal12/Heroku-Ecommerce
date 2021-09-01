<?php 

    if (isset($_GET['pageno'])) {

        $pageno = $_GET['pageno'];

    } else {
        $pageno = 1;
    }

    $no_of_records_per_page = 10;
    
    $offset = ($pageno-1) * $no_of_records_per_page; 


    if (isset($_GET['Group_Id'])) {
        $stms = $con->prepare("SELECT COUNT(*) as num FROM options WHERE 1 ");
        $stms->execute();
        $row = $stms->fetch(PDO::FETCH_ASSOC);
        $total_rows = $row['num'];
        
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        
        $stms = $con->prepare("SELECT `Option_ID`, `Option_Name`, options_groups.Option_Group_Name as `Group_Name` FROM `options` 
        INNER JOIN options_groups on options_groups.Option_Group_ID = options.Option_Option_Grouo_id
        WHERE Option_Option_Grouo_id = {$_GET['Group_Id']} LIMIT {$offset},{$no_of_records_per_page}");
        
    }else{
        $stms = $con->prepare("SELECT COUNT(*) as num FROM options WHERE 1 ");
        $stms->execute();
        $row = $stms->fetch(PDO::FETCH_ASSOC);
        $total_rows = $row['num'];
        
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        
        $stms = $con->prepare("SELECT `Option_ID`, `Option_Name`, options_groups.Option_Group_Name as `Group_Name` FROM `options` 
        INNER JOIN options_groups on options_groups.Option_Group_ID = options.Option_Option_Grouo_id
        WHERE 1 LIMIT {$offset},{$no_of_records_per_page}");
    }


    $stms->execute();
    $rows = $stms->fetchAll();





?>