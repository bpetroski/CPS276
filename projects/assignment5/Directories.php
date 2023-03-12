<?php

class Directories {

    private $dirName;
    private $dirPath;
    private $fileContents;
    private $filePath;

    public function testInput(){
        $output = "";
        $output .= "Folder Name: ".$this->getDirName()."<br>";
        $output .= "File Content: ".$this->getFileContents()."<br>";
        $output .= "Folder Path: ".$this->getDirPath()."<br>";
        $output .= "File Path: ".$this->getFilePath()."<br>";
        return $output;
    }

    public function setDirName($dirName){$this->dirName = $dirName; $this->setDirPath();}
    public function getDirName(){return $this->dirName;}
    public function setDirPath(){$this->dirPath = "directories/" . $this->getDirName() . "/"; $this->setFilePath();}
    public function getDirPath(){return $this->dirPath;}
    public function setFileContents($fileContents){$this->fileContents = $fileContents;}
    public function getFileContents(){return $this->fileContents;}
    public function setFilePath(){$this->filePath = $this->getDirPath()."readme.txt";}
    public function getFilePath(){return $this->filePath;}
    public function displayFilePath(){return '<a href="'.$this->getFilePath().'" style="color: blue; text-align: left">'.$this->getFilePath().'</a>';}

    public function __construct(){
        $this->setDirName($_POST["name-input"]);
        $this->setFileContents($_POST["text-input"]);
    }
    
    public function createDir(){
        $output = "";
        try{
            if(file_exists($this->getDirPath())){
                throw new Exception("A directory already exists with that name. <br>");
            }else{
                mkdir($this->getDirPath());
                $this->createFile();
                $output = "File and Directory successfully created. <br>";
                $output .= $this->displayFilePath();
            }
        }
        catch(Exception $e){$output = $e->getMessage(); }
        return $output;
    }
    public function createFile(){
        $readMeFile = fopen($this->getFilePath(), "w") or die("Unable to create file!");
        fwrite($readMeFile, $this->getFileContents());
        fclose($readMeFile);
    }
}

?>