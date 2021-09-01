<?php 

$sql = "SELECT * FROM items_order WHERE items_order.Order = ?";
$stms = $con->prepare($sql);
$stms->execute([
    $_GET['order_id']
]);
$Items = $stms->fetchAll();
$total_order = 0;
$total = 0 ;


$sql = "SELECT * FROM orders WHERE orders.Order_User_id = ?";
$stms = $con->prepare($sql);
$stms->execute([
    $_GET['user_id']
]);
$user = $stms->fetch();

$status = ['processed','Complete','Reactionary'];

?>