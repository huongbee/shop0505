<?php
require_once 'model/BaseModel.php';

class BaseController{

    public function loadView($view="home",$data=[]){
        $model = new BaseModel();
        $menu = $model->selectMenu();
        include_once 'view/layout.view.php';
    }
}



?>