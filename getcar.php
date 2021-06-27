
<?php
header('Content-type:text/html;charset=utf-8');
include_once("conn.php") ;
$userid = $_POST['userid'];
         $sql = "SELECT * FROM `cart` WHERE user_id='$userid'";
         $result = $conn->query($sql);
         $cart= array();
         while ($row = $result->fetch_assoc()) {
             $cart[]= $row;
         }

       exit(json_encode($cart));
       echo gettype($cart)
            
?>
            







