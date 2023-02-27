<?php

    class addNamesProc{

        private $name;
        private $firstName;
        private $lastName;
        private $nameList;

        // function AddNamesProc(){
        //     $firstName = $_POST["name-input"];
        // }

        // public function addClearNames(){
        //     return "Petroski, Brenden\nHarper, Karin\nParker, Peter";
           
        // }

        // public function addClearNames() {
        //     $name = $_POST['name-input'];
        //     if (!empty($name)) {
        //         $nameParts = explode(" ", $name);
        //         $formattedName = ucfirst($nameParts[0]) . " " . ucfirst($nameParts[1]);
        //         $names = $_POST['namelist'];
        //         if (!empty($names)) {
        //             $names .= "\n" . $formattedName;
        //         } else {
        //             $names = $formattedName;
        //         }
        //         return $names;
        //     } else {
        //         return $_POST['namelist'];
        //     }
        // }
   
            public function addClearNames(){
                
                $name = "b t";
                $name = $_POST["name-input"];

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
    
    // class AddNamesProc {

    //     public function __construct(){
            


    //     }


    // }



// class AddNamesProc {
//     private $names = [];

//     public function __construct() {
//         if (isset($_SESSION['names'])) {
//             $this->names = $_SESSION['names'];
//         }
//     }

//     public function addClearNames() {
//         if (isset($_POST['add-name-btn'])) {
//             $name = $_POST['name-input'];
//             $name = $this->formatName($name);
//             if (!empty($name)) {
//                 $this->names[] = $name;
//                 $_SESSION['names'] = $this->names;
//             }
//         } elseif (isset($_POST['clear-names-btn'])) {
//             $this->names = [];
//             unset($_SESSION['names']);
//         }

//         return $this->formatNames($this->names);
//     }

//     private function formatName($name) {

//     }

//     private function formatNames($names) {
//         return implode("\n", $names);
//     }
// }










?>