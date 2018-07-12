<?php
require_once "BaseController.php";
require_once "model/DetailModel.php";

class DetailController extends BaseController{
    function getDetail(){
        $url = $_GET['url'];
        $id = $_GET['id'];
        
        $model = new DetailModel;
        $product = $model->selectProduct($url,$id);
        if(!$product){
            header('Location:404.html');
            return;
        }
        $data = [
            'product' => $product
        ];
        return $this->loadView('detail',$data);
    }
}


?>