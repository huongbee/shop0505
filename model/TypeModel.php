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
    // function selectProductByType($type){
    //     $sql = "SELECT p.* , u2.url 
    //             FROM products p 
    //             INNER JOIN page_url u2 
    //             ON u2.id = p.id_url
    //             WHERE p.id_type = (SELECT c.id
    //                 FROM `categories` c 
    //                 INNER JOIN page_url u
    //                 ON u.id = c.id_url
    //                 WHERE u.url = '$type'
    //             )";
    //     return $this->loadMoreRows($sql);
    // }
    
    function selectProductByType($type){
        $sql = "SELECT p.* , u2.url
                FROM products p 
                INNER JOIN page_url u2 
                ON u2.id = p.id_url
                WHERE p.id_type = (SELECT c.id
                    FROM `categories` c 
                    INNER JOIN page_url u
                    ON u.id = c.id_url
                    WHERE u.url = ?)";
        return $this->loadMoreRows($sql,[$type]);
    }
}


?>