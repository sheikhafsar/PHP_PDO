<?php
    $error="";
    
 if (isset($_POST["submit2"])) {
     
     require_once 'Connect.php';
     
     $stmt = $DBcon->prepare("select id,name from users where name=:nm and password=:pwd");
                $stmt->bindParam(':nm',$_POST["uname"], PDO::PARAM_STR);
                $stmt->bindParam(':pwd',$_POST["passwd"], PDO::PARAM_STR);
                $stmt->execute();
                
               
     $count=$stmt->rowCount();
     //echo $count;
     
    // echo "</br>";
     
    if($count==1)
    {
        session_start();
        foreach ($stmt->fetchAll() as $row) {
        $_SESSION["id"]=$row["id"];
        $_SESSION["name"]=$row["name"];
        
        header('location:home.php');
     }
    }
    else{
        $error="Your Login Name or Password is invalid";
    }
                
   // 
     
 }
       
?>

<form  name="login" action="login.php" method="POST">
                Username : <input type="text" name="uname"/>
                <br/> <br/>
                Password : <input type="text" name="passwd"/>
                <br/> <br/>
               <input type="submit" name="submit2"/>
        </form>

<div> <?php echo $error; ?></div>

