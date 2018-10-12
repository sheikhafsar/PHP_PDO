<?php
session_start();  
   
   if (!isset($_SESSION["id"]))
   {
     header('location:login.php'); 
   }
   else 
   {
    
       echo "Welcome  $_SESSION[name]";
       
       echo '</br>';
   }
?>

<a href="logout.php">Logout</a>


