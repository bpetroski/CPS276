<?php

    class addNamesProc{

        private $name;
        private $firstName;
        private $lastName;
        private $nameList;

        $name=$_POST["name-input"];

        public function addClearNames(){
            
            $name = "b t";
            $name = $_POST["name-input"];
            return "Petroski, Brenden\nHarper, Karin\nParker, Peter";
            return $name;
        }

        public function formatName($name){
            // assume that the input contains the first and last name separated by a space
            $name_parts = explode(' ', trim($name));
            $first_name = ucfirst(strtolower($name_parts[0]));
            $last_name = ucfirst(strtolower($name_parts[count($name_parts) - 1]));
            return $last_name . ", " . $first_name;
        }

    }

    /*

    class AddNamesProc {

        public function __construct(){
            


        }


    }



class AddNamesProc {
    private $names = [];

    public function __construct() {
        if (isset($_SESSION['names'])) {
            $this->names = $_SESSION['names'];
        }
    }

    private function formatNames($names) {
        return implode("\n", $names);
    }
}


*/







?>