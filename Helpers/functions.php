<?php
function createToken(){
    $token = '';
    $str = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";

    for($i=1;$i<=50;$i++){
        $start = rand(0,strlen($str)-1);
        $tmp = substr($str,$start,1);
        $token.=$tmp;
       // $token.= substr($str,rand(0,strlen($str)-1),1);
    }
    return $token;
}

?>