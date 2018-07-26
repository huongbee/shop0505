<?php
require_once "BaseController.php";
require_once "model/ShoppingCartModel.php";
require_once "Helpers/Cart.php";
require_once "Helpers/functions.php";
require_once "Helpers/PHPMailer/mailer.php";
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
            $dateOrder = date('Y-m-d',time());
            $oldCart = isset($_SESSION['cart']) ?$_SESSION['cart'] :null;
            $cart = new Cart($oldCart);
            
            $total = $cart->totalPrice;
            $promtPrice = $cart->promtPrice;
            $paymentMethod = "COD";
            
            $token = createToken();
            $tokenDate = date('Y-m-d H:i:s',time()); //2018-4-5 12:45:25 -> 12345679654
            $tokenTime = strtotime($tokenDate);
            $status = 0; // not verify

            $idBill = $model->saveBill($idCustomer,$dateOrder,$total,$promtPrice,$paymentMethod,$note,$token, $tokenDate,$status);
            //echo $idBill; die;
            if($idBill){
                //save billdetail
                foreach($cart->items as $idProduct=>$item){
                    $qty = $item['qty'];
                    $price = $item['price'];
                    $discountPrice = $item['discountPrice'];

                    $check = $model->saveBillDetail($idBill,$idProduct, $qty, $price, $discountPrice);
                }
                if($check){

                    //send email;
                    $link = "http://localhost/shop0505/accept-order.php?token=$token&time=$tokenTime";

                    $subject = "Xác nhận đơn hàng DH000$idBill";
                    $content = "
                    <p>Chào bạn $name,</p>
                    <p>Cảm ơn bạn đã đặt hàng, Tổng tiền của đơn hàng là ".number_format($promtPrice)." vnđ </p>
                    <p>Vui lòng nhấp vào <a href='$link'>liên kết</a> để xác nhận đơn hàng.</p>
                    ";
                    sendMail($email,$name,$subject,$content);
                    
                    $_SESSION['success'] = "Vui lòng kiểm tra Email để xác nhận đơn hàng.";
                    //delete session cart
                    unset($_SESSION['cart']);
                    header('Location:checkout.php');
                    return;
                }
            }
        }
        $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại.";
        header('Location:checkout.php');
    }


    function acceptOrder(){
        $token = $_GET['token']; 
        $time = $_GET['time']; //1532605367
        $now = strtotime(date('Y-m-d H:i:s',time())); //1532605367
        if($now - $time > 86400){
            $_SESSION['error'] = "Thời hạn xác nhận đơn hàng đã kết thúc, vui lòng đặt hàng lại";
        }
        else{
            $model = new ShoppingCartModel;
            $bill = $model->findBillByToken($token);
            if($bill){
                //update
                $model->updateBill($bill->id);
                $_SESSION['success'] = "Đơn hàng xác nhận thành công, chúng tôi sẽ sớm liên lạc với bạn.";
            }
            else{
                $_SESSION['error'] = "Liên kết bạn nhập vào chưa đúng, vui lòng kiểm tra lại";
            }
        }
        return $this->loadView('notifycation');
    }
}


?>