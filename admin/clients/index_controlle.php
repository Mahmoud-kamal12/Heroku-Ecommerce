<?php 


    if (isset($_GET['pageno'])) {

        $pageno = $_GET['pageno'];

    } else {
        $pageno = 1;
    }

    $no_of_records_per_page = 10;
    
    $offset = ($pageno-1) * $no_of_records_per_page; 

    $stms = $con->prepare("SELECT COUNT(*) as num FROM users WHERE GroupID = 0 ");
    $stms->execute();
    $row = $stms->fetch(PDO::FETCH_ASSOC);
    $total_rows = $row['num'];
    
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $stms = $con->prepare("SELECT * FROM users WHERE GroupID = 0  LIMIT {$offset}, {$no_of_records_per_page}");

    $stms->execute();
    $rows = $stms->fetchAll();

?>