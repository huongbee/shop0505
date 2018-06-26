<?php

class BaseController{

    public function loadView($view="home",$data=[]){
        include_once 'view/layout.view.php';
    }
}



?>