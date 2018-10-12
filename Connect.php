
<?php

$DB_host = "localhost";
$DB_user = "afsar";
$DB_pass = "afsar123";
$DB_name = "php_pdo";

 try
 {
     $DBcon = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass); 
 }
 catch(PDOException $e)
 {
     echo "ERROR : ".$e->getMessage();
 }

 ?>



