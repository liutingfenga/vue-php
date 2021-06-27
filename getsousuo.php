
<?php
    header('content-type:application/json');
    include_once("conn.php") ;
    $keywords = $_POST['sousuo'];

            $sql = "select * from goods where goods_name like '%$keywords%'";
            $result = $conn->query($sql);
            $sousuo = array();
            while ($row = $result->fetch_assoc()) {
                $sousuo[]= $row;
            }
    
          
          exit(json_encode($sousuo));
          echo gettype($sousuo)
?>
            



