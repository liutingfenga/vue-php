
<?php
header('Content-type:text/html;charset=utf-8');
include_once("conn.php");

$user_id = $_POST['user_id'];
$goods_id = $_POST['goods_id'];
$goods_name = $_POST['goods_name'];
$price = $_POST['price'];
$picture = $_POST['picture'];
$nums = $_POST['nums'];


//sql语句
$sql_select1 = "select goods_id from cart where goods_id = '$goods_id'";
//sql语句执行
$result1 = mysqli_query($conn, $sql_select1);
//判断购物车商品是否已存在
$zh = mysqli_num_rows($result1);
if (!$result1) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}


if ($zh > 0) { 
    $sql_insert2 = "update cart set nums=nums+'$nums' where goods_id = '$goods_id'";
    //插入数据
    $result2 = $conn->query($sql_insert2);
    exit(json_encode(1));
} else {
    $sql_insert3 = "insert into cart(user_id,goods_id,goods_name,price,picture,nums) values('$user_id','$goods_id','$goods_name','$price','$picture','$nums')";
    //插入数据
    $result3 = $conn->query($sql_insert3);
    exit(json_encode(2));
    // $ret = mysqli_query($conn, $sql_insert);
    // $row = mysqli_fetch_array($ret);
    //注册成功
    // exit(json_encode('注册成功'));
    // echo gettype('注册成功');
}


?>
            







