
<?php
    header('content-type:application/json');
    include_once("conn.php") ;
            $sql = "select * from adv";
            $result = $conn->query($sql);
            $lunbotu = array();
            while ($row = $result->fetch_assoc()) {
                $lunbotu[]= $row;
            }
    
          
          exit(json_encode($lunbotu));
          echo gettype($lunbotu)
?>
            



