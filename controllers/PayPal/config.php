<?php

session_start();

require_once "../../vendor/autoload.php";
include "../../admin/connect.php";

use Omnipay\Omnipay;
 
define('CLIENT_ID', 'AbJL6xMIt6xyg-aW6Rj84KXLc48KTfo3RhXXT7tauywn3N5xFtzR4tsmOWRemAYUXB-mSKzZZaWpwn0F');
define('CLIENT_SECRET', 'EJb8m6Z7Vtw8rF-ptAemieAbgr3LfFVGNj8va2s6yiBU4pryhioC8CCMvMSZuy4LU7npwnt0SZUp407U');

define('PAYPAL_RETURN_URL', 'http://localhost:8088/Colage%20Project/E-Commerce/controllers/PayPal/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost:8088/Colage%20Project/E-Commerce/controllers/PayPal/cancel.php');
define('PAYPAL_CURRENCY', 'USD'); // set your currency here

$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true); //set it to 'false' when go live


