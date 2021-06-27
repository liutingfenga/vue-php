
<?php
header('Content-type:text/html;charset=utf-8');
include_once("conn.php");



$sql = "delete from cart";
$result = $conn->query($sql);
exit(json_encode(1));

?>
            










