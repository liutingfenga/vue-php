
<?php
header("Content-Type: text/html; charset=UTF-8");

include_once("conn.php");

$user = $_POST["uname"];;
$pass = $_POST["pwd"];;

$sql_select = "select uname,pwd from user where uname = '$user' and pwd = '$pass'";


$ret = mysqli_query($conn,$sql_select);
$row = mysqli_fetch_array($ret); 


if($user == $row['uname']&&$pass == $row['pwd']){
    exit(json_encode(1));
    echo gettype(1);
}else{
    exit(json_encode(2));
    echo gettype(2);
    
}  



?>
            
