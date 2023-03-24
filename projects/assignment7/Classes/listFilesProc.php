<?php
require_once 'Pdo_methods.php';

     function listFiles(){
		$pdo = new PdoMethods();
		$sql = "SELECT * FROM PDF_Table";

        $records = $pdo->selectNotBinded($sql);

        if($records == 'error'){
			return 'There has been and error processing your request';
		}
		else {
			if(count($records) != 0){
                return createList($records);
			}
			else {
				return 'no files found';
			}
		}
    }

     function uploadFile(){
        $pdo = new PdoMethods();

		$sql = "INSERT INTO PDF_Table (filename, filepath) VALUES (:filename_input, :filepath)";

	    $bindings = [
			[':filename_input',$_POST['name-input'],'str'],
			[':filepath','PDF/'.$_FILES["pdf-file"]["name"],'str']
		];

        $result = $pdo->otherBinded($sql, $bindings);

        if($result === 'error'){
			return 'There was an error adding the file';
		}
		else {
			return 'file has been added';
		}

    }

    function createList($records){
        $list = '<ul>';
		foreach ($records as $row){
            $list .= "<li><a target='_blank' href='{$row['filepath']}'>{$row['filename']}</a></li>";
		}
		$list .= '</ul>';
		return $list;
    }
