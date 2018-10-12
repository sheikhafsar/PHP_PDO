
<?php

require_once 'Connect.php';

$stmt = $DBcon->prepare("select * from users");
$stmt->execute();

foreach ($stmt->fetchAll() as $row) {
    echo $row["name"];
    echo '</br>';
}
?>
<br>


<a href="delete.php"> DELETE users</a>

<a href="insert.php"> ADD users</a>
