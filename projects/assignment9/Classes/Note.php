<?php
    require_once 'Pdo_methods.php';

    class Note extends PdoMethods{

        private $timestamp;
        private $noteMsg;

        public function getTimestamp(){return $this->timestamp;}
        public function getNoteMsg(){return $this->noteMsg;}
        public function setTimestamp($timestamp){$this->timestamp = strtotime($timestamp);}
        public function setNoteMsg($noteMsg){$this->noteMsg = $noteMsg;}
        public function testOutput(){return $this->getTimestamp()."==".Note::formatTimestamp($this->getTimestamp())." ".$this->getNoteMsg();}

        public function __construct(){
            date_default_timezone_set('America/Detroit');
            $this->setTimestamp($_POST['dateTime']);
            $this->setNoteMsg($_POST['note-input']);
        }

        public function addNoteDB(){
            if($_POST['dateTime'] == '' && $_POST['note-input'] == ''){return "Please enter in a date, time, and note.";}            
            if($_POST['dateTime'] == ''){return "Please enter in a date and time.";}
            if($_POST['note-input'] == ''){return "Please enter in a note.";}
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
                return 'note has been added. <br>';
            }
        }

        public static function displayNotesDB(){
            $pdo = new PdoMethods();
            $sql = "SELECT date_time, note FROM notes WHERE date_time BETWEEN :begDate AND :endDate ORDER BY date_time DESC";

            // echo 'beg:';
            // echo strtotime($_POST['begDate']);
            // echo 'end:';
            // echo strtotime($_POST['endDate']);

            $bindings = [
                [':begDate',strtotime($_POST['begDate']),'int'],
                ['endDate',strtotime($_POST['endDate']),'int']
            ];

            $records = $pdo->selectBinded($sql,$bindings);

            if($records == 'error'){
                return 'There has been an error retrieving notes.';
            }else{
                if(count($records) != 0){
                    return Note::makeTable($records);
                }else{
                    return 'No Notes Found.';
                }
            }

        }

        public static function formatTimestamp($timestamp){
            return date("m\/d\/Y h\:i a", $timestamp);
        }

        public static function makeTable($records){
            $output = "<table class='table table-bordered table-striped'><thead><tr>";
            $output .= "<th>Date and Time</th><th>Note</th></tr><tbody>";
            foreach($records as $row){
                $formattedTime = Note::formatTimestamp($row['date_time']);
                $output .= "<tr><td>$formattedTime</td>";
                $output .= "<td>{$row['note']}</td></tr>";
            }
            
            $output .= "</tbody></table>";
            return $output;
        }
    }


?>