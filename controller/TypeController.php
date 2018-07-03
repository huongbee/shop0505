<?php
require_once "BaseController.php";
require_once "model/TypeModel.php";

class TypeController extends BaseController{
    function getType(){
        $url = $_GET['url'];
        //echo $type;die;
        $model = new TypeModel;
        $products = $model->selectProductByType($url);
        $type = $model->selectTypeByUrl($url);
        //print_r($type);die;
        $data = [
            'products' => $products,
            'nameType' => $type->name
        ];
        return $this->loadView('type',$data);
    }
}


?>