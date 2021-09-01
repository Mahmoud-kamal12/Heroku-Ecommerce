<?php 

/*
SELECT P.Product_Name , P.Product_Desc , P.Product_Purchase_Price , P.Product_Sale_Price , P.Product_Tax_Percent , P.Product_discount_Percent , P.Product_Overview , P.Product_Attributes  , cat.Category_Name , B.Brand_Name , O.Option_Name FROM products as P LEFT JOIN product_category as C on C.Product = P.Product_ID LEFT JOIN categories as cat on C.Category = cat.Cateory_ID LEFT JOIN brands as B on B.Brand_ID = P.Product_Brand_id LEFT JOIN product_option as PO on PO.Product = P.Product_ID LEFT JOIN options as O on O.Option_ID = PO.Option WHERE cat.Category_Name LIKE '%B%'
*/

    if (isset($_GET['pageno'])) {

        $pageno = $_GET['pageno'];

    } else {
        $pageno = 1;
    }

    $no_of_records_per_page = 10;
    
    $offset = ($pageno-1) * $no_of_records_per_page; 

    if (isset($_GET['search']) && $_GET['search'] !== "") {


        $arr = ['P.Product_Brand_id' , 'P.Product_ID', 'P.Product_Images' ,'P.Product_Name' , 'P.Product_Desc' , 'P.Product_Purchase_Price' , 'P.Product_Sale_Price' , 'P.Product_Shipping_Price' , 'P.Product_Attributes' , 'P.Product_Tax_Percent' , 'P.Product_discount_Percent' , 'P.Product_Overview' , 'Product_Attributes' , 'cat.Category_Name'  , 'B.Brand_Name' , ' O.Option_Name'];
        $sele = implode("," , $arr);
        $q = implode(" Like '%". $_GET['search'] . "%' OR " , $arr);
        $q .= " Like '%".  $_GET['search'] . "%'";

        $stms = $con->prepare("SELECT COUNT(*) as num FROM products as P LEFT JOIN product_category as C on C.Product = P.Product_ID LEFT JOIN categories as cat on C.Category = cat.Cateory_ID LEFT JOIN brands as B on B.Brand_ID = P.Product_Brand_id LEFT JOIN product_option as PO on PO.Product = P.Product_ID LEFT JOIN options as O on O.Option_ID = PO.Option WHERE {$q} GROUP BY P.Product_ID ORDER BY  P.Product_ID DESC");

        $stms->execute();
        $row = $stms->fetch(PDO::FETCH_ASSOC);
        $total_rows = $row['num'];
        
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        
        $stms = $con->prepare("SELECT {$sele} FROM products as P LEFT JOIN product_category as C on C.Product = P.Product_ID LEFT JOIN categories as cat on C.Category = cat.Cateory_ID LEFT JOIN brands as B on B.Brand_ID = P.Product_Brand_id LEFT JOIN product_option as PO on PO.Product = P.Product_ID LEFT JOIN options as O on O.Option_ID = PO.Option WHERE $q GROUP BY P.Product_ID LIMIT {$offset}, {$no_of_records_per_page} ORDER BY  P.Product_ID DESC");

        $stms->execute();
        $rows = $stms->fetchAll();
    }else{

        $stms = $con->prepare("SELECT COUNT(*) as num FROM products WHERE 1 ");
        $stms->execute();
        $row = $stms->fetch(PDO::FETCH_ASSOC);
        $total_rows = $row['num'];
        
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        
        $stms = $con->prepare("SELECT * FROM products LEFT JOIN brands on brands.Brand_ID = products.Product_Brand_id WHERE 1 ORDER BY  Product_ID DESC LIMIT {$offset}, {$no_of_records_per_page} ");

        $stms->execute();
        $rows = $stms->fetchAll();
    }

?>