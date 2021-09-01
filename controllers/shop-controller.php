<?php



$pageno = (isset($_GET['pageno']))? $_GET['pageno'] : 1;
$mainCatID = 'categories.Parent_Category';
$mainCatID .= (isset($_GET['mainCatID'])) ? ' = '.$_GET['mainCatID'] : ' IN (1 , 2 , 3)';

if (isset($_GET['search']) && $_GET['search'] !== "") {
    $search_word = $_GET['search'];
    $no_of_records_per_page = 9;
    $offset = ($pageno-1) * $no_of_records_per_page; 
    
    $arr = ['P.Product_Brand_id' , 'P.Product_ID', 'P.Product_Images' ,'P.Product_Name' , 'P.Product_Desc' , 'P.Product_Purchase_Price' , 'P.Product_Sale_Price' , 'P.Product_Shipping_Price' , 'P.Product_Attributes' , 'P.Product_Tax_Percent' , 'P.Product_discount_Percent' , 'P.Product_Overview' , 'Product_Attributes' , 'cat.Category_Name'  , 'B.Brand_Name' , ' O.Option_Name'];
    $sele = implode("," , $arr);
    $q = implode(" Like '%". $_GET['search'] . "%' OR " , $arr);
    $q .= " Like '%".  $_GET['search'] . "%'";

    $stms = $con->prepare("SELECT COUNT(*) as num FROM products as P LEFT JOIN product_category as C on C.Product = P.Product_ID LEFT JOIN categories as cat on C.Category = cat.Cateory_ID LEFT JOIN brands as B on B.Brand_ID = P.Product_Brand_id LEFT JOIN product_option as PO on PO.Product = P.Product_ID LEFT JOIN options as O on O.Option_ID = PO.Option WHERE {$q} GROUP BY P.Product_ID");

    $stms->execute();
    $row = $stms->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $total_rows = $row['num'];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

    
        $stms = $con->prepare("SELECT {$sele} FROM products as P LEFT JOIN product_category as C on C.Product = P.Product_ID LEFT JOIN categories as cat on C.Category = cat.Cateory_ID LEFT JOIN brands as B on B.Brand_ID = P.Product_Brand_id LEFT JOIN product_option as PO on PO.Product = P.Product_ID LEFT JOIN options as O on O.Option_ID = PO.Option WHERE $q GROUP BY P.Product_ID LIMIT {$offset}, {$no_of_records_per_page}");
    
        $stms->execute();
        $products = $stms->fetchAll();
    }else{
        $products = [];
    }
    

}else{

$no_of_records_per_page = 9;
$offset = ($pageno-1) * $no_of_records_per_page; 
$sql = "SELECT * FROM products  LEFT JOIN brands on brands.Brand_ID =  products.Product_Brand_id WHERE products.Product_ID in ( SELECT product_category.Product FROM product_category WHERE product_category.Category IN (SELECT categories.Cateory_ID FROM categories WHERE {$mainCatID} ) GROUP BY product_category.Product)";

$stms = $con->prepare($sql);
$stms->execute();
$rows = $stms->fetchAll();
$total_pages = ceil(count($rows) / $no_of_records_per_page);



$sql .= "LIMIT {$offset},{$no_of_records_per_page} ";
$stms = $con->prepare($sql);
$stms->execute();

$products = $stms->fetchAll();
}

?>