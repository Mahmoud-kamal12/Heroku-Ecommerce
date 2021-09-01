<?php


$sql = "SELECT * FROM products  LEFT JOIN brands on brands.Brand_ID =  products.Product_Brand_id WHERE products.Product_ID = ?";

$stms = $con->prepare($sql);

$stms->execute([
    $_GET['id']
]);

$product = $stms->fetch();

$sql = "SELECT * FROM options INNER JOIN product_option on options.Option_ID = product_option.Option INNER JOIN options_groups on options_groups.Option_Group_ID = options.Option_Option_Grouo_id WHERE product_option.Product = ? AND options_groups.Option_Group_Name LIKE '%color%'";

$stms = $con->prepare($sql);

$stms->execute([
    $_GET['id']
]);


$colors = $stms->fetchAll();

// print_r($colors);
// exit();

$sql = "SELECT * FROM options INNER JOIN product_option on options.Option_ID = product_option.Option INNER JOIN options_groups on options_groups.Option_Group_ID = options.Option_Option_Grouo_id WHERE product_option.Product = ? AND options_groups.Option_Group_Name LIKE '%size%'";

$stms = $con->prepare($sql);

$stms->execute([
    $_GET['id']
]);

$sizes = $stms->fetchAll();


$url = "./product-details.php?id={$_GET['id']}" . "&name=" . slugify($product['Product_Name']) . "&price=" . slugify($product['Product_Sale_Price']) . "&description=" . slugify($product['Product_Desc']);

if (count($_GET) == 1) {
    header("Location:{$url}");
}




?>