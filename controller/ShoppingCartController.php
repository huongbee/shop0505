<?php
require_once "BaseController.php";
require_once "model/ShoppingCartModel.php";
require_once "Helpers/Cart.php";
session_start();

class ShoppingCartController extends BaseController{
    
    function getShoppingCart(){
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new  Cart($oldCart);
        // print_r($cart);
        // die;
        return $this->loadView('shopping-cart',$cart);
    }

    function addToCart(){
        $id = $_POST['id'];
        $qty = isset($_POST['qty']) ? $_POST['qty'] : 1;

        $model = new ShoppingCartModel;
        $product = $model->findProductById($id);
        // a>b ? a : b
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$qty);

        $_SESSION['cart'] = $cart;
        echo $product->name;
    }
}



?>