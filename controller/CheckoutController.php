<?php
require_once "BaseController.php";
require_once "model/ShoppingCartModel.php";
require_once "Helpers/Cart.php";
require_once "Helpers/functions.php";
session_start();

class CheckoutController extends BaseController{
    function getCheckout(){
        return $this->loadView('checkout');
    }

    function postCheckout(){
        $oldCart = isset($_SESSION['cart']) ?$_SESSION['cart'] :null;
            $cart = new Cart($oldCart);
            echo "<pre>";
            print_r($cart);die;
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
            $dateOrder = date('Y-m-d',time());
            $oldCart = isset($_SESSION['cart']) ?$_SESSION['cart'] :null;
            $cart = new Cart($oldCart);
            
            $total = $cart->totalPrice;
            $promtPrice = $cart->promtPrice;
            $paymentMethod = "COD";
            
            $token = createToken();
            $tokenDate = date('Y-m-d H:i:s',time());
            $status = 0; // not verify

            $idBill = $model->saveBill($idCustomer,$dateOrder,$total,$promtPrice,$paymentMethod,$note,$token, $tokenDate,$status);
            if($idBill){
                //save billdetail
                foreach($cart->items as $idProduct=>$item){
                    $qty = $item['qty'];
                    $price = $item['price'];
                    $discountPrice = $item['discountPrice'];

                    $check = $model->saveBillDetail($idBill,$idProduct, $qty, $price, $discountPrice);
                }
                if($check){

                    //send email

                    //notification : check email...
                    $_SESSION['success'] = "Vui lòng kiểm tra Email để xác nhận đơn hàng.";
                    //delete session cart
                    // unset($_SESSION['cart']);
                }
            }
            else{
                $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại.";
            }
        }
        else{
            $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại.";
        }
        header('Location:checkout.php');


       
    }
}


?>