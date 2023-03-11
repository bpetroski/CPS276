<?php

// echo "test <br>";
// echo "Folder Name: ", $_POST["name-input"], "<br>";
// echo "Txt File: ", $_POST["text-input"];

class Directories {

    private $dirName;
    private $fileName;

    public function testInput(){
        $output = "";
        $output .= "Folder Name: ";
        $output .= $_POST["name-input"];
        $output .= "<br>";
        $output .= "File Content: ";
        $output .= $_POST["text-input"];
        $output .= "<br>";
        return $output;
    }

    public function setDirName($dirName){
        $dirName = "directories/" . this->$dirName;
    }

    public function getDirName(){
        return $dirName;
    }

    public function __construct(){
        $dirName .= "test";
    }
    
    public function createDir(){
        $output = "";
       // setDirName("test");
        try{
            if(file_exists($dirName)){
                throw new Exception("Directory Already exists <br>");
            }else{
                mkdir("directories/test");
            }
        }
        catch(Exception $e){
            $output = $e->getMessage();
        }

        $output .= " end of message. ";
        return $output;
    }

}

?>