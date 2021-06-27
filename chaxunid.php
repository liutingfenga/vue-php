
<?php
header('content-type:application/json');
include_once("conn.php");

$userid = $_POST["userid"];
//sql语句
$sql_select = "select id from user where uname = '$userid'";
//sql语句执行
$result = mysqli_query($conn, $sql_select);
//判断用户名是否已存在
$zh = mysqli_fetch_array($result);


exit(json_encode($zh['id']));
echo gettype($zh['id'])
?>
            



