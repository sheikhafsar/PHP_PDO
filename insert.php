
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
            
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            $target_file = $target_dir . $_POST["nm"] . "." .$imageFileType;
           
            

            echo "<br/><br/>";
            echo $imageFileType;
            echo "<br/><br/>";

            
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            
            // Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
            
            header("location:view_delete.php");
            }
            
 }
?>
<form  name="frm1" action="" method="POST" enctype="multipart/form-data">
                Name : <input type="text" name="nm"/>
                <br/><br/>
              
                Password : <input type="text" name="passwd"/>
                <br/><br/>
                
                
                Photo : <input type="file" name="fileToUpload" id="fileToUpload"/>
                <br/><br/>
                
                <input type="submit" name="submit1"/>
</form>

<div> <?php echo $error; ?></div>