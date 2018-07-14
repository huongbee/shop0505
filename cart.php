<?php
require_once 'controller/ShoppingCartController.php';

$c = new ShoppingCartController;
return $c->addToCart();

?>