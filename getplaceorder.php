<?php  

header("Content-Type: text/html; charset=UTF-8");

include_once("conn.php");

$date = $_POST['date'];
$user_id = $_POST['user_id'];
$goods_id = $_POST['goods_id'];
$pay = $_POST['pay'];
$address = $_POST['address'];

$sql_insert = "insert into orders(date,user_id,goods_id,pay,address) values('$date','$user_id','$goods_id','$pay','$address')";

//插入数据
$result = $conn->query($sql_insert);

exit(json_encode(1));

?>
   
   
   
   