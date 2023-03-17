<?php

// use libphonenumber\NumberParseException;
// use libphonenumber\PhoneNumber;
// use libphonenumber\PhoneNumberFormat;
// use libphonenumber\PhoneNumberUtil;

// $phoneUtil = PhoneNumberUtil::getInstance();

class Customer {

    private $name = "Brenden Petroski";
    private $phoneNumber = "248-787-1553";
    private $existingCustomer = true; // boolean
    private $callResult = "declined"; // either voicemail/interested/declined
    private $quotedProduct = "SyncUP Tracker Bundle"; // string value

    // getters
    public function getName(){return $this->name;}
    public function getPhoneNumber(){return $this->phoneNumber;}
    public function getExistingCustomer(){return $this->existingCustomer;}
    public function getCallResult(){return $this->callResult;}
    public function getQuotedProduct(){return $this->quotedProduct;}
    // setters
    public function setName($name){$this->name = $name;}
    public function setPhoneNumber($phoneNumber){$this->phoneNumber = $this->formatPhoneNumber($phoneNumber);}
    public function setExistingCustomer($existingCustomer){$this->existingCustomer = $existingCustomer;}
    public function setCallResult($callResult){$this->callResult = $callResult;}
    public function setQuotedProduct($quotedProduct){$this->quotedProduct = $quotedProduct;}

    public function __construct(){
        $this->name = $this->setName($_POST["name"]);
        $this->phoneNumber = $this->setPhoneNumber($_POST["phone-number"]);
        $this->existingCustomer = $this->setExistingCustomer($_POST["currentCx"]);
        $this->callResult = $this->setCallResult($_POST["call-result"]);
        $this->quotedProduct = $this->setQuotedProduct($_POST["quoted-product"]);
    }

    public function testOutput(){
        $debugString = "";
        $debugString .= "Customer Information <br>Name: ".$this->getName()."<br>Phone Number: ".$this->getPhoneNumber().
        "<br>Current Customer: ".$this->getExistingCustomer()."<br>Call Result:".$this->getCallResult().
        "<br>Quoted Product".$this->getQuotedProduct();
        return $debugString;
    }

    public function formatPhoneNumber($phoneNumber){
        $formattedNumber = "";
        $formattedNumber = substr($phoneNumber, -10, -7) . "-" . substr($phoneNumber, -7, -4) . "-" . substr($phoneNumber, -4);
        return $formattedNumber;
    }


}