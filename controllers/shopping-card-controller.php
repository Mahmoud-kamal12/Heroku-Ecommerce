<?php
if (isset($_SESSION['ID']) && isset($_SESSION['User_Name'])) {
    if (strtoupper($_SERVER['REQUEST_METHOD']) === 'GET' ) {
        $sql = "SELECT * FROM products INNER JOIN cart on cart.Item = products.Product_ID INNER JOIN users on users.User_ID = cart.User WHERE users.User_ID = ?";
        $stms = $con->prepare($sql);
        $stms->execute([
            $_SESSION['ID']
        ]);
        $rows = $stms->fetchAll();

    }else{
        $page = "../shop";
        header("Location:$page.php");
    }
}else{
    $msg = "you must login to can add to cart";
    $page = "./login";
    header("Location:$page.php?err=1&msg={$msg}");
}

?>