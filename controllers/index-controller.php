<?php


$sql = "SELECT * FROM products  LEFT JOIN brands on brands.Brand_ID =  products.Product_Brand_id WHERE products.Product_ID in ( SELECT product_category.Product FROM product_category WHERE product_category.Category IN (SELECT categories.Cateory_ID FROM categories WHERE categories.Parent_Category = 1 ) GROUP BY product_category.Product)";

$stms = $con->prepare($sql);
$stms->execute();
$rows = $stms->fetchAll();
$count = count($rows)-1;
$men= array();
for ($i =0; $i <20; $i++ ){
    $index = rand(0,$count);
    $row = $rows[$index];
    array_push($men ,$row);
}

$sql = "SELECT * FROM products  LEFT JOIN brands on brands.Brand_ID =  products.Product_Brand_id WHERE products.Product_ID in ( SELECT product_category.Product FROM product_category WHERE product_category.Category IN (SELECT categories.Cateory_ID FROM categories WHERE categories.Parent_Category = 2 ) GROUP BY product_category.Product)";

$stms = $con->prepare($sql);
$stms->execute();
$rows = $stms->fetchAll();
$count = count($rows)-1;
$women= array();
for ($i =0; $i <20; $i++ ){
    $index = rand(0,$count);
    $row = $rows[$index];
    array_push($women ,$row);
}

?>