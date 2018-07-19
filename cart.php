<?php
require_once 'controller/ShoppingCartController.php';

$c = new ShoppingCartController;
if(isset($_POST['action']) && $_POST['action'] == "delete"){
    return $c->deleteCart();
}
elseif(isset($_POST['action']) && $_POST['action'] == "update"){
    return $c->updateCart();
}
else
    return $c->addToCart();

?>