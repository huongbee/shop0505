<?php

include_once "DBConnect.php";
class ShoppingCartModel extends DBConnect{

    function findProductById($id){
        $sql = "SELECT id,name,price,promotion_price,image
                FROM products 
                WHERE id=$id";
        return $this->loadOneRow($sql);
    }

    function saveCustomer($name, $email, $phone, $address, $gender){
        $sql = "INSERT INTO customers(name,email,phone,address,gender)
                VALUES('$name','$email','$phone','$address','$gender')";
        $check = $this->executeQuery($sql);
        if($check){
            return $this->getIdInserted();
        }
        else{
            return false;
        }
    }

    function saveBill($idCustomer,$dateOrder,$total,$promtPrice,$paymentMethod,$note,$token, $tokenDate,$status){
        $sql = "INSERT INTO bills
                (id_customer,date_order,total, promt_price,payment_method,note,token,token_date,status)
                VALUES ($idCustomer,'$dateOrder',$total,$promtPrice,'COD','$note','$token','$tokenDate',0)";
        //echo $sql;die;
        $check = $this->executeQuery($sql);
        if($check){
            return $this->getIdInserted();
        }
        else{
            return false;
        }
    }
    function saveBillDetail($idBill,$idProduct, $qty, $price, $discountPrice){
        $sql =  "INSERT INTO bill_detail(id_bill,id_product,quantity, price, discount_price) VALUES ($idBill,$idProduct,$qty,$price,$discountPrice)";
        return $this->executeQuery($sql);
    }   
}

?>