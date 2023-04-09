<?php
    require_once 'Pdo_methods.php';

    class Note extends PdoMethods{

        private $timestamp;
        private $noteMsg;

        public function getTimestamp(){return $this->timestamp;}
        public function getNoteMsg(){return $this->noteMsg;}
        public function setTimestamp($timestamp){$this->timestamp = strtotime($timestamp);}
        public function setNoteMsg($noteMsg){$this->noteMsg = $noteMsg;}
        public function testOutput(){return $this->getTimestamp()."==".$this->formatTimestamp($this->getTimestamp())." ".$this->getNoteMsg();}

        public function __construct(){
            date_default_timezone_set('America/Detroit');
            $this->setTimestamp($_POST['dateTime']);
            $this->setNoteMsg($_POST['note-input']);
            $this->addNoteDB();
        }

        public function addNoteDB(){
            $pdo = new PdoMethods();
            $sql = "INSERT INTO notes (date_time, note) VALUES (:datetime, :note)";
            $bindings = [
                [':datetime',$this->getTimestamp(),'str'],
                [':note',$this->getNoteMsg(),'str']
            ];
            $result = $pdo->otherBinded($sql,$bindings);
            
            if($result === 'error'){
                return 'There was an error adding that note<br>';
            }else{
                return 'note added. <br>';
            }
        }

        public function displayNotesDB(){
            $pdo = new PdoMethods();
            $sql = "SELECT date_time, note FROM note WHERE date_time BETWEEN :begDate AND :endDate ORDER BY date_time DESC";
        }

        public function formatTimestamp($timestamp){
            return date("m\/d\/Y h\:i a", $timestamp);
        }

        public function makeTable($records){
            # code...
        }
    }


?>