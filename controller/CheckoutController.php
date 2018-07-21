<?php
require_once "BaseController.php";
require_once "model/ShoppingCartModel.php";
session_start();

class CheckoutController extends BaseController{
    function getCheckout(){
        return $this->loadView('checkout');
    }

    function postCheckout(){
        $name = $_POST['fullname'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $note = $_POST['note'];
        $address = $_POST['address'];
        $email = $_POST['email'];

        //save customer
        $model = new ShoppingCartModel;
        $idCustomer = $model->saveCustomer($name, $email, $phone, $address, $gender);
        if($idCustomer){
             //save bill
            //save billdetail
            //send email
            //notification : check email...
            //delete session cart
        }
        else{
            $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại.";
            header('Location:checkout.php');
        }


       
    }
}


?>