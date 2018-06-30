<?php
require_once "BaseController.php";
require_once "model/HomeModel.php";

class HomeController extends BaseController{
    function getHome(){
        $model = new HomeModel;
        $slide = $model->selectSlide();
        print_r($slide);
        die;
        return $this->loadView('home');
    }
}


?>