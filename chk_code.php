<?php
header("Content-type:text/html;charset=utf-8");

session_start(); 

// $code = file_get_contents('php://input');
// $key = integer($code / 10000 + 1, 10);
// $key = intval ($code);
// echo (int)$code, "\n"; ;
// parse_str($code ,$kkk);

$code= $_POST["code"];

if($code == $_SESSION['helloweba_num']){ 
    exit(json_encode(1));
    echo gettype(1);
} else {
    exit(json_encode(2));
    echo gettype(2);
}


?>