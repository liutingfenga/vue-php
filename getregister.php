
<?php
header("Content-Type: text/html; charset=UTF-8");

include_once("conn.php");

$user_zhanghao = $_POST["zhanghao"];
$user_mima = $_POST["mima"];
$user_shouji = $_POST["shouji"];
$user_xingbie = $_POST["xingbie"];
$user_youxiang = $_POST["youxiang"];
$user_dizhi = $_POST["dizhi"];


//sql语句
$sql_select = "select uname from user where uname = '$user_zhanghao'";
//sql语句执行
$result = mysqli_query($conn, $sql_select);
//判断用户名是否已存在
$zh = mysqli_num_rows($result);


if ($zh > 0) {
    exit(json_encode(1));
} else {
    //用户名不存在
    $sql_insert = "insert into user(uname,pwd,tel,sex,email,address) values('$user_zhanghao','$user_mima','$user_shouji','$user_xingbie','$user_youxiang','$user_dizhi')";
    //插入数据
    $result = $conn->query($sql_insert);

    exit(json_encode(2));
    // $ret = mysqli_query($conn, $sql_insert);
    // $row = mysqli_fetch_array($ret);
    //注册成功
    // exit(json_encode('注册成功'));
    // echo gettype('注册成功');
}


?>
            
