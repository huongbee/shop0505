<?php
require_once "BaseController.php";
require_once "model/TypeModel.php";
require_once "Helpers/Pager.php";
require_once "model/BaseModel.php";

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
        $tongSP = count($model->selectProductByType($url));
       
        $pager = new Pager($tongSP,$page,9,3);
        $showPagination = $pager->showPagination();
       
        $type = $model->selectTypeByUrl($url);
        //print_r($type);die;

        $baseModel = new BaseModel;
        $categories = $baseModel->selectMenu();
        // print_r($categories);die;

        $data = [
            'products' => $products,
            'nameType' => $type->name,
            'showPagination' => $showPagination,
            'categories' => $categories
        ];


        return $this->loadView('type',$data);
    }
    function getProductsByTypeAjax(){
        $idType = $_GET['id'];
        $model = new TypeModel;
        $products = $model->selectProductsByType($idType);
        $data = [
            'products'=>$products,
            'idType'=>$idType
        ];
        return $this->callViewAjax('products',$data);
    }
}


?>