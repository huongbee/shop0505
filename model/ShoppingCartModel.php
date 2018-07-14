<?php

include_once "DBConnect.php";
class ShoppingCartModel extends DBConnect{
    
    function findProductById($id){
        $sql = "SELECT name,price,promotion_price,image
                FROM products 
                WHERE id=$id";
        return $this->loadOneRow($sql);
    }
}

?>