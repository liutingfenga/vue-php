
<?php
 header("Content-Type: text/html; charset=UTF-8");
 include_once("conn.php") ;
        $sql = "SELECT * FROM gonggao limit 20";
         $result = $conn->query($sql);
         $gonggao = array();
         while ($row = $result->fetch_assoc()) {
             $gonggao[]= $row;
         }
 
      
       exit(json_encode($gonggao));
       echo gettype($gonggao)
            
?>
            



