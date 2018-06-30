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

    function selectBestSeller(){
        $sql = "SELECT p.*, sum(quantity) as soluong
                FROM `bill_detail` d
                INNER JOIN products p 
                ON p.id = d.id_product
                GROUP BY p.id
                ORDER BY soluong DESC 
                LIMIT 0,10";
                
        return $this->loadMoreRows($sql);
    }
}


?>