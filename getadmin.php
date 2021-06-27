
<?php
header('Content-type:text/html;charset=utf-8');

 include_once("conn.php") ;
         $sql = "select * from admin";
         $result = $conn->query($sql);
         $admin = array();
         while ($row = $result->fetch_assoc()) {
             $admin[]= $row;
         }
 
       exit(json_encode($admin));
       echo gettype($admin)
            
?>
            



