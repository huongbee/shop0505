<?php
class DBConnect{

    private $connect;

    function __construct($db='php0505_3',$username='root', $password = ''){
        $this->connect = new PDO("mysql:host=localhost;dbname=$db",$username,$password);
        $this->connect->exec("set names utf8");
    }

    function setStatement($sql,$data=[]){
        $stmt = $this->connect->prepare($sql);
        for($i=0; $i<count($data);$i++){
            $stmt->bindValue($i+1, $data[$i]);
        }
        return $stmt;
    }

    //INSERT/UPDATE/DELETE
    function executeQuery($sql,$data=[]){
        $stmt = $this->setStatement($sql,$data);
        return $stmt->execute();
    }

    //SELECT 1 row
    function loadOneRow($sql,$data=[]){
        $stmt = $this->setStatement($sql,$data);
        $c = $stmt->execute();
        return $c ? $stmt->fetchObject() : false;
    }

    //SELECT >1 rows
    function loadMoreRows($sql,$data=[]){
        $stmt = $this->setStatement($sql,$data);
        $c = $stmt->execute();
        return $c ? $stmt->fetchAll(PDO::FETCH_OBJ) : false;
    }
}



?>