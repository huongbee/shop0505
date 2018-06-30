<?php
require_once "BaseController.php";
require_once "model/HomeModel.php";

class HomeController extends BaseController{
    function getHome(){
        $model = new HomeModel;
        $slide = $model->selectSlide();
        $specialProduct = $model->selectSpecialProduct();
        $data = [
            'slide'=>$slide,
            'specialProduct' => $specialProduct
        ];
        //print_r($specialProduct);
        return $this->loadView('home',$data);
    }
}


?>