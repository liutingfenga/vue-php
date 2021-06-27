
<?php
header('Content-type:text/html;charset=utf-8');

include_once("../conn.php");
$pageSize = 10;

$pages = $_POST['pages'];
$pageVal = $pages;
$page = ($pageVal-1)*$pageSize;
//去数据库取数据
$sql = "select * from user limit $page,$pageSize";


// $page是当前的页数,$pagesize是每页取得条数

// $sql = "select * from user";
$result = $conn->query($sql);
$user = array();
while ($row = $result->fetch_assoc()) {
  $user[] = $row;
}

exit(json_encode($user));
echo gettype($user);



?>
            



