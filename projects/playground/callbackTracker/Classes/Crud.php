<?php
require 'Pdo_methods.php';

class Crud extends PdoMethods{

    public function showCustomers($interested){
        
    }

    public function addCustomer(){
        $pdo = new PdoMethods();
        $sql = "INSERT INTO callbackCustomers (CxName, CxPhone, currentCustomer,
        CxInterested, offeredProduct, otherInfo)
        VALUES (:name, :phone, :currentCustomer, 
        :interested, :offeredProduct, :otherInfo )";

        $bindings = [
            [':name',$_POST['name'],'str'],
            [':phone',$_POST['phone-number'],'str'],
            [':currentCustomer',$_POST['currentCx'],'bool'],
            [':interested',$_POST['call-result'],'str'],
            [':offeredProduct',$_POST['quoted-product'],'str'],
            [':otherInfo',$_POST['other-info'],'str']
        ];

        $result = $pdo->otherBinded($sql,$bindings);

        if($result === 'error'){
            return 'There was an error adding that customer to our database. <br>';
        }else{
            return 'Customer added. <br>';
        }
    }
}