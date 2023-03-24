<?php
require_once 'Pdo_methods.php';

// class listFilesProc extends PdoMethods{

     function listFiles(){
		$pdo = new PdoMethods();
		$sql = "SELECT * FROM PDF_Table";

        $records = $pdo->selectNotBinded($sql);

        if($records == 'error'){
			return 'There has been and error processing your request';
		}
		else {
			if(count($records) != 0){
				// if($type == 'list'){return $this->createList($records);}
				// if($type == 'input'){return $this->createInput($records);}	
                return createList($records);
			}
			else {
				return 'no files found';
			}
		}
    }

     function uploadFile(){
        $pdo = new PdoMethods();

		/* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
		$sql = "INSERT INTO PDF_Table (filename, filepath) VALUES (:filename_input, :filepath)";

        /* THESE BINDINGS ARE LATER INJECTED INTO THE SQL STATEMENT THIS PREVENTS AGAIN SQL INJECTIONS */
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


// }