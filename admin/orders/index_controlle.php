<?php 

    $sql = (isset($_GET['clint_id']))? 'Order_User_id = ' . $_GET['clint_id'] : 1;

    if (isset($_GET['pageno'])) {

        $pageno = $_GET['pageno'];

    } else {
        $pageno = 1;
    }

    $no_of_records_per_page = 10;
    
    $offset = ($pageno-1) * $no_of_records_per_page; 

    $stms = $con->prepare("SELECT COUNT(*) as num FROM orders WHERE {$sql} ");
    $stms->execute();
    $row = $stms->fetch(PDO::FETCH_ASSOC);
    $total_rows = $row['num'];
    
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $stms = $con->prepare("SELECT * FROM orders WHERE {$sql} LIMIT {$offset}, {$no_of_records_per_page}");
    $stms->execute();
    $rows = $stms->fetchAll();

?>