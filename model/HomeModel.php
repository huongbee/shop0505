<?php
require_once 'DBConnect.php';
class HomeModel extends DBConnect{

    function selectSlide(){
        $sql = "SELECT * FROM slide WHERE status=1";
        return $this->loadMoreRows($sql);
    }

    function selectSpecialProduct(){
        $sql = "SELECT p.*,u.url 
                FROM products p
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE status=1"; 
        return $this->loadMoreRows($sql);
    }
}


?>