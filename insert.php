
    <?php
    
        $error="";
        require_once 'Connect.php';

        echo "register user";

 if (isset($_POST["submit1"])) {
            //echo  json_encode($_POST);
     
               //check if user exist
     
            $stmt = $DBcon->prepare("select * from users where password=:pwd");
             //$stmt->bindParam(':nm',$_POST["nm"], PDO::PARAM_STR);
             $stmt->bindParam(':pwd',$_POST["passwd"], PDO::PARAM_STR);
            $stmt->execute();
            
            if($stmt->rowCount())
            {
                $error = "User password alreday exists";
            }
            else {
                
            $stmt = $DBcon->prepare("insert into users(name,password) VALUES(:n, :p)");
            $stmt->bindparam(':n', $_POST["nm"]);
         
            $stmt->bindparam(':p', $_POST["passwd"]);
 
            $stmt->execute();
            
            
            header("location:view_delete.php");
            }
            
 }
?>
<form  name="frm1" action="" method="POST" enctype="multipart/form-data">
                Name : <input type="text" name="nm"/>
                <br/><br/>
              
                Password : <input type="text" name="passwd"/>
                <br/><br/>
                
                
                <input type="submit" name="submit1"/>
</form>

<div> <?php echo $error; ?></div>