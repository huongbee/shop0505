<?php
include_once 'DBConnect.php';

class DetailModel extends DBConnect{
    function selectProduct($url,$id){
        $sql = "SELECT p.*
                FROM products p
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE p.id = $id
                AND u.url = '$url'";
        return $this->loadOneRow($sql);
    }
}



?>