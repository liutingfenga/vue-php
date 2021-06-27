
<?php
header("Content-Type: text/html; charset=UTF-8");

include_once("../conn.php");

$id = $_POST["id"];;


$sql_select = "delete from orders where id='$id'";



$ret = mysqli_query($conn, $sql_select);
$result = mysqli_query($conn, $sql_select);
if (!$result) {
    echo "删除失败</br>";
} else {
    echo 1;
}

?>
            
