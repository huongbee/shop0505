<?php
require_once "BaseController.php";
require_once "model/DetailModel.php";

class DetailController extends BaseController{
    function getDetail(){
        $url = $_GET['url'];
        $id = $_GET['id'];
        
        $model = new DetailModel;
        $product = $model->selectProduct($url,$id);
        //print_r($product);die;
        if(!$product){
            header('Location:404.html');
            return;
        }
        $relatedProducts = $model->selectRelatedProducts($product->id_type, $id);
        $data = [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ];
        return $this->loadView('detail',$data);
    }
}


?>