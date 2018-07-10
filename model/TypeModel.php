<?php
require_once "DBConnect.php";
class TypeModel extends DBConnect{
    /**
        SELECT p.*, u2.url
        FROM products p 
        INNER JOIN categories c 
        ON c.id = p.id_type
        INNER JOIN page_url u 
        ON u.id = c.id_url
        INNER JOIN page_url u2 
        ON u2.id = p.id_url
        WHERE u.url = "phu-kien"
     */
    // function selectProductByType($type,$position,$qty){
    //     $sql = "SELECT p.* , u2.url 
    //             FROM products p 
    //             INNER JOIN page_url u2 
    //             ON u2.id = p.id_url
    //             WHERE p.id_type = (SELECT c.id
    //                 FROM `categories` c 
    //                 INNER JOIN page_url u
    //                 ON u.id = c.id_url
    //                 WHERE u.url = '$type'
    //             )
    //             LIMIT $position,$qty";

    //     //echo $sql; die;
    //     return $this->loadMoreRows($sql);
    // }

    function selectProductByType($type, $position=-1, $qty=-1){
        $sql = "SELECT p.* , u2.url
                FROM products p 
                INNER JOIN page_url u2 
                ON u2.id = p.id_url
                WHERE p.id_type = (SELECT c.id
                    FROM `categories` c 
                    INNER JOIN page_url u
                    ON u.id = c.id_url
                    WHERE u.url = ?) ";
        if($position>=0 || $qty>=0){
            $sql .= "LIMIT ?,?";
            return $this->loadMoreRows($sql,[$type,$position,$qty]);
        }
        return $this->loadMoreRows($sql,[$type]);
    }

    function selectTypeByUrl($url){
        $sql = "SELECT c.name
                FROM `categories` c 
                INNER JOIN page_url u
                ON u.id = c.id_url
                WHERE u.url = ?";
        return $this->loadOneRow($sql,[$url]);
    }
    function selectProductsByType($id){
        $sql = "SELECT p.*, u.url
                FROM `categories` c 
                INNER JOIN products p
                ON p.id_type = c.id
                INNER JOIN page_url u
                ON u.id = p.id_url
                WHERE c.id = ?";
        return $this->loadMoreRows($sql,[$id]);
    }
}


?>