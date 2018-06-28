<?php
require_once 'DBConnect.php';

class BaseModel extends DBConnect{

    function selectMenu(){
        $sql = "SELECT c.*, u.url 
                FROM `categories` c 
                INNER JOIN page_url u 
                ON c.id_url = u.id";
        return $this->loadMoreRows($sql);
    }
}


?>