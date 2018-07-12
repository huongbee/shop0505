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
    function selectRelatedProducts($idType, $idProduct){
        $sql = "SELECT p.*, u.url
                FROM products p
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE id_type = $idType
                AND p.id != $idProduct";
        return $this->loadMoreRows($sql);
    }
}



?>