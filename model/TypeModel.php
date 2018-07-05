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
    function selectProductByType($type,$position,$qty){
        $sql = "SELECT p.* , u2.url 
                FROM products p 
                INNER JOIN page_url u2 
                ON u2.id = p.id_url
                WHERE p.id_type = (SELECT c.id
                    FROM `categories` c 
                    INNER JOIN page_url u
                    ON u.id = c.id_url
                    WHERE u.url = '$type'
                )
                LIMIT $position,$qty";

        //echo $sql; die;
        return $this->loadMoreRows($sql);
    }

    // function selectProductByType($type, $position, $qty){
    //     $sql = "SELECT p.* , u2.url
    //             FROM products p 
    //             INNER JOIN page_url u2 
    //             ON u2.id = p.id_url
    //             WHERE p.id_type = (SELECT c.id
    //                 FROM `categories` c 
    //                 INNER JOIN page_url u
    //                 ON u.id = c.id_url
    //                 WHERE u.url = ?)
    //             LIMIT ?,?";
    //     return $this->loadMoreRows($sql,[$type,$position,$qty]);
    // }
    function selectTypeByUrl($url){
        $sql = "SELECT c.name
                FROM `categories` c 
                INNER JOIN page_url u
                ON u.id = c.id_url
                WHERE u.url = ?";
        return $this->loadOneRow($sql,[$url]);
    }
}


?>