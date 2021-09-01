<?php

require_once './vendor/fzaninotto/faker/src/autoload.php';

include "./init.php";

$faker = Faker\Factory::create();



// for ($i=0; $i < 20; $i++) { 
//     $sql = "INSERT INTO `users` (`User_ID`,`User_Name`, `User_Email`, `User_Password`, `User_Password_Hash`) VALUES (NULL, ?, ?, ? , ?)";
//     $stms = $con->prepare($sql);
//     $pass = $faker->password;
//     $User_Password_Hash = sha1($pass);
//     $data = [
//         $faker->name,
//         $faker->email,
//         $pass,
//         $User_Password_Hash,
//     ];
//     $stms->execute($data);
// }



// $mydir = './layout/images/Products/Men'; 

// $myfiles = array_diff(scandir($mydir), array('.', '..')); 

// $Ima = $faker->randomElements($myfiles, $count = 5);

// $pa = "./layout/images/Products/Men/" . $Ima[0];

// $Images = file_get_contents($pa);

// echo "<pre>";
// print_r($Images["tmp_name"]);

// $target_dir = "admin/uploads/";
// $myArray = array();

// for($i = 0; $i < count($Images); $i++){
//     $name =  hash('ripemd160', basename($Images[$i]). time()). basename($Images[$i]);
//     $target_file = $target_dir . $name;
//     move_uploaded_file($Images[$i], $target_file);
    
//     array_push($myArray , $name);
// }
// $e = serialize($myArray);



// $colors = [];
// for ($i=0; $i < 20; $i++) { 
//     array_push($colors , $faker->hexcolor); 
// }

// foreach ($colors as $value) {
//     $sql = "INSERT INTO `options`(`Option_ID`, `Option_Name`, `Option_Option_Grouo_id`) VALUES (NULL , ? , 14)";
//     $stms = $con->prepare($sql);
//     $stms->execute([$value]);
// }





// for ($i = 0; $i < 10; $i++) {
    

//     $sql = "SELECT Brand_ID FROM `brands` WHERE 1 ";
//     $stms = $con->prepare($sql);
//     $stms->execute();
//     $rows = $stms->fetchAll();
//     $index =  array_rand($rows);
//     $brand = $rows[$index][0]; 
    
    
//     $sql = "SELECT Cateory_ID FROM `categories` WHERE Parent_Category IS NOT NULL ";
//     $stms = $con->prepare($sql);
//     $stms->execute();
//     $rows = $stms->fetchAll();
//     $Categoriesids = [];
//     $indexs =  array_rand($rows , 2);
//     for ($i=0; $i < count($indexs); $i++) { 
//         array_push($Categoriesids , $indexs[$i]);
//     }
    
//     $sql = "SELECT Option_ID FROM `options` WHERE 1";
//     $stms = $con->prepare($sql);
//     $stms->execute();
//     $rows = $stms->fetchAll();
//     $Optionsids = [];
//     $indexs =  array_rand($rows , 2);
//     for ($i=0; $i < count($indexs); $i++) { 
//         array_push($Optionsids , $indexs[$i]);
//     }
    

//     $stms = $con->prepare("INSERT INTO `products` (`Product_ID`, `Product_Name`, `Product_Desc`,  `Product_Purchase_Price`, `Product_Sale_Price`, `Product_Tax_Percent`, `Product_discount_Percent`, `Product_Images`, `Product_Overview`, `Product_Attributes`, `Product_Brand_id`, `Product_Shipping_Price`)   VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?)");

//     $arr = [
//             $faker->name($gender = null),
//             $faker->text($maxNbChars = 300) ,
//             rand(100 , 300),
//             rand(100 , 300),
//             rand(1 , 15),
//             rand(5 , 40),
//             serialize(['default.png']),
//             $faker->text($maxNbChars = 600),
//             $faker->text($maxNbChars = 800),
//             $brand,
//             rand(30 , 15)
//         ];

//     $stms->execute($arr);
    
//     $last_id = $con->lastInsertId();

//     for ($i=0; $i < count($Optionsids) ; $i++) { 
//         $stms = $con->prepare("INSERT INTO `product_option`(`Option` , `Product`) VALUES (?,?)");
//         $stms->execute([
//             $Optionsids[$i],
//             $last_id,
//         ]);
//     }

//     for ($i=0; $i < count($Categoriesids) ; $i++) { 
//         $stms = $con->prepare("INSERT INTO `product_category`(`Product`, `Category`) VALUES (?,?)");
//         $stms->execute([
//             $last_id,
//             $Categoriesids[$i],
//         ]);
//     }

// }





