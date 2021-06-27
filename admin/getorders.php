
<?php
header('Content-type:text/html;charset=utf-8');
include_once("../conn.php");

$sql = "select * from orders";
$result = $conn->query($sql);
$orders = array();
while ($row = $result->fetch_assoc()) {
  $orders[] = $row;
}

exit(json_encode($orders));
echo gettype($orders)
?>
            







