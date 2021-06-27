
<?php
header('Content-type:text/html;charset=utf-8');

include_once("../conn.php");


$sqlz = "select * from user";
$resultz = $conn->query($sqlz);
$userz = array();
while ($row = $resultz->fetch_assoc()) {
  $userz[] = $row;
}


exit(json_encode($userz));
echo gettype($userz)


?>
            



