<?php
require_once "BaseController.php";
require_once "model/TypeModel.php";

class TypeController extends BaseController{
    function getType(){
        $url = $_GET['url'];
        $qty = 9;
        $page = 1;
        if(isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0){
            $page = $_GET['page'];
        };
        $position = ($page - 1)*$qty;

        $model = new TypeModel;
        $products = $model->selectProductByType($url,$position, $qty);
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