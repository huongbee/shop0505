<?php
require_once "BaseController.php";
class TypeController extends BaseController{
    function getType(){
        return $this->loadView('type');
    }
}


?>