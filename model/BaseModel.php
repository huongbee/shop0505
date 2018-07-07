<?php
require_once 'DBConnect.php';

class BaseModel extends DBConnect{

    function selectMenu(){
        $sql = "SELECT c.*, u.url , count(p.id) as soluong
                FROM `categories` c 
                INNER JOIN page_url u 
                ON c.id_url = u.id
                INNER JOIN products as p
                ON p.id_type = c.id
                GROUP BY c.id";
        return $this->loadMoreRows($sql);
    }
}


?>