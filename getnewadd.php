<?php  

header("Content-Type: text/html; charset=UTF-8");

include_once("conn.php");

$id = $_POST['userid'];
$address = $_POST['newadd'];
$tel = $_POST['newtel'];


$sql_insert = "UPDATE user SET address = '$address', tel = '$tel' WHERE id = '$id'";


//插入数据
$result = $conn->query($sql_insert);

exit(json_encode(1));

?>
   