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

    public function formatPhoneNumber($phoneNumber){
        $formattedNumber = "";
        $formattedNumber = substr($phoneNumber, -10, -7) . "-" . substr($phoneNumber, -7, -4) . "-" . substr($phoneNumber, -4);
        return $formattedNumber;
    }


}