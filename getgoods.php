
<?php
header('Content-type:text/html;charset=utf-8');

 include_once("conn.php") ;
         $sql = "select * from goods";
         $result = $conn->query($sql);
         $goods = array();
         while ($row = $result->fetch_assoc()) {
             $goods[]= $row;
         }
 
       exit(json_encode($goods));
       echo gettype($goods)
            
?>
            



