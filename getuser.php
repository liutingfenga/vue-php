
<?php
header("Content-Type: text/html; charset=UTF-8");

include_once("conn.php");

$userid = $_POST["id"];;

$sql = "select * from user where id = '$userid' ";
$result = $conn->query($sql);
$user = array();
while ($row = $result->fetch_assoc()) {
    $user[]= $row;
}
exit(json_encode($user));
echo gettype($user)
?>
            
