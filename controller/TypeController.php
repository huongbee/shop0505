<?php
require_once "BaseController.php";
require_once "model/TypeModel.php";

class TypeController extends BaseController{
    function getType(){
        $type = $_GET['url'];
        //echo $type;die;
        $model = new TypeModel;
        $products = $model->selectProductByType($type);
        //print_r($products);die;
        $data = [
            'products' => $products
        ];
        return $this->loadView('type',$data);
    }
}


?>