
<?php
header("Content-Type: text/html; charset=UTF-8");

include_once("conn.php");


$id = $_POST["id"];

$pass = $_POST["pwd"];

$sql_select = "UPDATE user set pwd='$pass' where id='$id'";

$result = $conn->query($sql_select);
exit(json_encode(1));



?>
            
