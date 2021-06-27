
<?php
header("Content-Type: text/html; charset=UTF-8");

include_once("conn.php");
$goods_id = $_POST["id"];
$sql = "select * from goods where id = '" . $goods_id . "'";
$result = $conn->query($sql);

$goodsInfo = array();
while ($row = $result->fetch_assoc()) {
  $goodsInfo[] = $row;
}


exit(json_encode($goodsInfo));
echo gettype($goodsInfo)

?>
            
