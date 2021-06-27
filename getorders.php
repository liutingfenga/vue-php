
<?php
header('Content-type:text/html;charset=utf-8');
include_once("conn.php");
$userid = $_POST['userid'];
$sql = "select * from orders where user_id = '$userid'";
$result = $conn->query($sql);
$orders = array();
while ($row = $result->fetch_assoc()) {
  $orders[] = $row;
}

exit(json_encode($orders));
echo gettype($orders)
?>
            







