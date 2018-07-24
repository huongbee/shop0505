<?php
require_once 'model/BaseModel.php';

class BaseController{

    function __construct(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }

    public function loadView($view="home",$data=[]){
        $model = new BaseModel();
        $menu = $model->selectMenu();
        include_once 'view/layout.view.php';
    }
    
    function callViewAjax($view, $data=[]){
        include_once "view/ajax/$view.php";
    }
}

?>