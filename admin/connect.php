<?php
$host      = "localhost";
$dbname    = "e-commerce";
$username  = "root";
$password  = "";
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);
try {
    
    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    
} catch (\PDOException $e) {
    
    echo 'Whoops, could not connect to the SQLite database!' . $e->getMessage();

}