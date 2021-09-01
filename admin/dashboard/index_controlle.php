<?php 

    $arr = [
        'brands' => ['num' => 0 , 'link' => 'brand.php'],
        'orders' => ['num' => 0 , 'link' => 'order.php'], 
        'categories' => ['num' => 0 , 'link' => 'category.php'], 
        'options_groups' => ['num' => 0 , 'link' => 'optionsGroup.php'], 
        'options' => ['num' => 0 , 'link' => 'option.php'], 
        'products' => ['num' => 0 , 'link' => 'product.php'], 
        'users' => ['num' => 0 , 'link' => 'client.php']
    ];

    foreach ($arr as $key => $val) {
        $stms = $con->prepare("SELECT COUNT(*) as num FROM {$key} WHERE 1 ");
        $stms->execute();
        $result = $stms->fetch(PDO::FETCH_ASSOC);
        $arr[$key]['num'] = $result['num'];
    }


?>