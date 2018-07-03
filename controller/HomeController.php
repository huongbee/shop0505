<?php
require_once "BaseController.php";
require_once "model/HomeModel.php";

class HomeController extends BaseController{
    function getHome(){
        $model = new HomeModel;
        $slide = $model->selectSlide();
        $specialProduct = $model->selectSpecialProduct();
        $bestSeller = $model->selectBestSeller();
        $promotionProducts = $model->selectPromotionProducts();
        $data = [
            'slide'=>$slide,
            'specialProduct' => $specialProduct,
            'bestSeller'=>$bestSeller,
            'promotionProducts'=>$promotionProducts
        ];
        //print_r($specialProduct);
        return $this->loadView('home',$data);
    }
}


?>