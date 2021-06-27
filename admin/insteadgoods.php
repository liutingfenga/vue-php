
<?php
header('Content-type:text/html;charset=utf-8');

include_once("../conn.php");

$goods_name = $_POST['goods_name'];
$type = $_POST['type'];
$price = $_POST['price'];
$description = $_POST['description'];
$old_price = $_POST['old_price'];
$picture = $_POST['picture'];

$sql = "insert into goods (goods_name,type,price,description,old_price,picture) 
value ('$goods_name','$type','$price','$description','$old_price','$picture')";


//插入数据
$result = $conn->query($sql);

exit(json_encode(1));

?>
            



