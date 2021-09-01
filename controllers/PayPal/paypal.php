<?php
require_once 'config.php';
 
if (strtoupper($_POST['payment']) == strtoupper('paypal') && isset($_SESSION['ID']) && isset($_SESSION['User_Name'])) {
    try {
        
        $response = $gateway->purchase(array(
            'amount' => $_POST['amount'],
            'currency' => PAYPAL_CURRENCY,
            'returnUrl' => PAYPAL_RETURN_URL,
            'cancelUrl' => PAYPAL_CANCEL_URL,
        ))->send();

        if ($response->isRedirect()) {


        $sql = "SELECT * FROM products INNER JOIN cart on cart.Item = products.Product_ID INNER JOIN users on users.User_ID = cart.User WHERE users.User_ID = ?";
        $stms = $con->prepare($sql);
        $stms->execute([
            $_SESSION['ID']
        ]);
        $cart_items = $stms->fetchAll();

        if (empty($cart_items)) {
            $page = "../check-order";
            $msg = "You don't have any product in your cart";
            header("Location:$page.php?err=1&msg={$msg}");
        }else{

            $total_order_price = 0;
            foreach ($cart_items as $value) {
                $total_order_price = $value['Quantity']* $value['Product_Sale_Price'];
            }
            
            $sql = "INSERT INTO `orders` (`Order_ID`, `Order_Date`, `Order_User_id`, `Order_First_Name`, `Order_Last_Name`, `Order_User_Country`, `Order_User_City`, `Order_User_Zip`, `Order_User_Adress`, `Order_User_Adress2`, `Order_User_Phone`, `Order_User_Email`, `Order_Tax_Percent`, `Order_discount_Percent`, `Order_Total`) VALUES (NULL , current_timestamp(), ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , NULL , NULL ,?)";

            $stms = $con->prepare($sql);

            $stms->execute([
                $_SESSION['ID'],
                $_POST['Order_First_Name'],
                $_POST['Order_Last_Name'],
                $_POST['Order_User_Country'],
                $_POST['Order_User_City'],
                $_POST['Order_User_Zip'],
                $_POST['Order_User_Adress'],
                $_POST['Order_User_Adress2'],
                $_POST['Order_User_Phone'],
                $_POST['Order_User_Email'],
                $total_order_price
            ]);

            $last_id = $con->lastInsertId();

            $_SESSION['order_id'] = $last_id;
            
            foreach ($cart_items as $cart_item) {
                $sql = "INSERT INTO `items_order`(`Item`, `Order`, `Item_Name`, `Item_Sale_Price`,`Item_Tax_Percent`, `Item_discount_Percent`, `Item_Shipping_Price` , `Quantity`) VALUES (?,?,?,?,?,?,? , ?)";
                $stms = $con->prepare($sql);
                
                $stms->execute([
                    $cart_item['Product_ID'],
                    $last_id,
                    $cart_item['Product_Name'],
                    $cart_item['Product_Sale_Price'],
                    $cart_item['Product_Tax_Percent'],
                    $cart_item['Product_discount_Percent'],
                    $cart_item['Product_Shipping_Price'],
                    $cart_item['Quantity'],
                ]);
            }
        }


            $response->redirect(); // this will automatically forward the customer
        } else {
            // not successful
            echo $response->getMessage();
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}else{
    $msg = "you must login to can add to cart";
    $page = "../login";
    header("Location:$page.php?err=1&msg={$msg}");
}