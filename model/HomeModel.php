<?php
require_once 'DBConnect.php';
class HomeModel extends DBConnect{

    function selectSlide(){
        $sql = "SELECT * FROM slide WHERE status=1";
        return $this->loadMoreRows($sql);
    }

    function selectSpecialProduct(){
        $sql = "SELECT * FROM products WHERE status=1"; 
        return $this->loadMoreRows($sql);
    }
}


?>