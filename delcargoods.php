
<?php
header('Content-type:text/html;charset=utf-8');
include_once("conn.php");

$carid = $_POST['id'];


$sql = "delete from cart where id='$carid'";
$result = $conn->query($sql);
exit(json_encode(1));

?>
            







