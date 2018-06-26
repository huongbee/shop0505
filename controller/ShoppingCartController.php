<?php
require_once "BaseController.php";

class ShoppingCartController extends BaseController{
    
    function getShoppingCart(){
        return $this->loadView('shopping-cart');
    }
}



?>