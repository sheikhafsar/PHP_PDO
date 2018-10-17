<?php

    require_once 'Connect.php';
    
   if (isset($_POST["submit1"])){
       //echo "hi";
       $user=$_POST["user"];
       
       $count= count($user);
       //echo $count;
       
       for ($x = 0; $x < $count; $x++) {
        $stmt = $DBcon->prepare("delete from users where id=:u");
      
        $stmt->bindparam(':u', $user[$x]);
        $stmt->execute();
    } 
       
   }
   
   if (isset($_POST["insert"])){
       header("location:insert.php");
   }
?>

<form action="view_delete.php" method="post">
    
    <?php

    require_once 'Connect.php';

    $stmt = $DBcon->prepare("select * from users");
    $stmt->execute();
    
   // echo count($stmt);
    
   // $count=$stmt->rowCount(); //total count of users
    
    //echo $count;
    
    echo "</br>";

    echo  "<table width=400px border=1>";
    
    foreach ($stmt->fetchAll() as $row) {
        echo "<tr>";
            echo  "<td>";
        echo $row["id"];
        echo " ";
            echo  "</td>";
            
            echo  "<td>";
        echo "<img src=uploads/$row[name].jpg height=42 weight=42>";
        echo " ";
            echo  "</td>";
            
            echo  "<td>";
        echo $row["name"];
        echo "<input type=checkbox  name=user[] value=$row[id] />";
            echo  "</td>";
        echo "<tr>";
        echo '</br>';
    }
    
    echo  "</table>";

    ?>
    
    <input type="submit" name="submit1" value="DELETE"/>
    <input type="submit" value="ADD USER" name="insert" />
</form>

<!-- <a href="insert.php"> ADD users</a> 
<input type="submit" value="ADD USER" name="insert" /> -->

