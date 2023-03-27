<?php
require 'Pdo_methods.php';

class Crud extends PdoMethods{

    public function showCustomers($interested){
        $pdo = new PdoMethods();
        $sql = 'SELECT * FROM callbackCustomers';

        $records = $pdo->selectNotBinded($sql);

        if($records == 'error'){
            return 'There has been an error processing your request.';
        }else{
            if(count($records) != 0){
                return $this->createList($records);    
            }else{
                return 'no names found.';
            }
        }
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
            [':currentCustomer',$_POST['currentCx'],'int'],
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

    public function createList($records){
        $list = '<ul>';
        foreach ($records as $row){
            $list .= "<li> {$row['CxName']} {$row['CxPhone']} {$row['currentCustomer']} {$row['CxInterested']} {$row['offeredProduct']} {$row['otherInfo']} </li>";
        }
        $list .= '</ul>';
        return $list;        
    }
}