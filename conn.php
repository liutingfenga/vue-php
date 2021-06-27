<?php

header("Content-Type: text/html; charset=UTF-8");

$conn = @mysqli_connect('127.0.0.1','root','','shop');

if (mysqli_connect_errno($conn)) 
{ 
    echo "连接 MySQL 失败: " . mysqli_connect_error(); 
} 

// 修改数据库连接字符集为 utf8
mysqli_set_charset($conn,"utf8");


?>
