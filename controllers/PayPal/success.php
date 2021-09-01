<?php
require_once 'config.php';

// Once the transaction has been approved, we need to complete it.
if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
    $transaction = $gateway->completePurchase(array(
        'payer_id'             => $_GET['PayerID'],
        'transactionReference' => $_GET['paymentId'],
    ));
    $response = $transaction->send();

    if ($response->isSuccessful()) {

        $arr_body = $response->getData();
        
        $dataintre = [];
        $dataintre[] = NULL;
        $dataintre[] = $arr_body['id']; // PAYID
        $dataintre[] = $_SESSION['ID']; // User ID 
        $dataintre[] = $arr_body['payer']['payer_info']['payer_id']; //payer_id
        $dataintre[] = $arr_body['payer']['payer_info']['email']; //    payer_email
        $dataintre[] = $arr_body['payer']['payer_info']['first_name']; // payer_first_name
        $dataintre[] = $arr_body['payer']['payer_info']['last_name']; //  payer_last_name
        $dataintre[] = serialize($arr_body['payer']['payer_info']['shipping_address']); // payer_shipping_address
        $dataintre[] = $arr_body['transactions'][0]['payee']['email']; // payee_email 
        $dataintre[] = $arr_body['transactions'][0]['amount']['total']; // amount
        $dataintre[] = PAYPAL_CURRENCY; //currency
        $dataintre[] = $arr_body['state']; // payment_status
        echo "<pre>";
        print_r($dataintre);
        try {

            $sql = "INSERT INTO `payments`(`id`, `payment_id`, `Payment_User_Id`, `payer_id`, `payer_email`, `payer_first_name`, `payer_last_name`, `payer_shipping_address`, `payee_email`, `amount`, `currency`, `payment_status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $stms = $con->prepare($sql);
            $stms->execute($dataintre);

            $sql = "DELETE FROM `cart` WHERE cart.User = ?";
            $stms = $con->prepare($sql);
            $stms->execute([
                $_SESSION['ID'],
            ]);

            $page = "../../check-order";
            $msg = "order added successfuly";
            header("Location:$page.php?err=2&msg={$msg}");

        } catch (\Throwable $th) {
            $sql = "DELETE FROM `orders` WHERE cart.User = ?";
            $stms = $con->prepare($sql);
            $stms->execute([
                $_SESSION['order_id'],
            ]);
            
            $sql = "DELETE FROM `items_order` WHERE cart.User = ?";
            $stms = $con->prepare($sql);
            $stms->execute([
                $_SESSION['order_id'],
            ]);

            unset($_SESSION['order_id']);
        }
    } else {
        echo $response->getMessage();

        $sql = "DELETE FROM `orders` WHERE cart.User = ?";
        $stms = $con->prepare($sql);
        $stms->execute([
            $_SESSION['ID'],
        ]);
        
        $sql = "DELETE FROM `items_order` WHERE cart.User = ?";
        $stms = $con->prepare($sql);
        $stms->execute([
            $_SESSION['order_id'],
        ]);

        unset($_SESSION['order_id']);
    }
} else {

    $sql = "DELETE FROM `orders` WHERE cart.User = ?";
    $stms = $con->prepare($sql);
    $stms->execute([
        $_SESSION['ID'],
    ]);
    
    $sql = "DELETE FROM `items_order` WHERE cart.User = ?";
    $stms = $con->prepare($sql);
    $stms->execute([
        $_SESSION['order_id'],
    ]);
    unset($_SESSION['order_id']);

    echo 'Transaction is declined';
}
