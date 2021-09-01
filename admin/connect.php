<?php
$host      = "remotemysql.com";
$dbname    = "P5RwN3wREp";
$username  = "P5RwN3wREp";
$password  = "BzBL0Hgwqc";
$port      = "3306";
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);
try {
    
    $con = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    
} catch (\PDOException $e) {
    
    echo 'Whoops, could not connect to the SQLite database!' . $e->getMessage();

}
