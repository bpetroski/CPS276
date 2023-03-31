<?php
    require_once '../classes/Pdo_methods.php';

    $pdo = new PdoMethods();
    $sql = "SELECT * FROM names";

    $records = $pdo->selectNotBinded($sql);
   
    $json = $records;

    /* IF THERE IS A PROBLEM GETTING THE FILE CONTENTS THEN CREATE AN OBJECT AND SEND THE ERROR MESSAGE TO THE BROWSER*/
    if(!$json){
        $response = (object) [
            'masterstatus' => 'error',
            'msg' => 'Could not read file',
        ];
        echo json_encode($response); /* BECAUSE WE DON'T WANT TO GO ANY FURTHER WITH THIS OPERATION TERMINATE IT HERE */
        exit;
    }

    /* IF ALL IS OKAY THEN CREATE AN OBJECT FROM THE JSON FILE USING JSON_DECODE*/
    // $json = json_decode($json);

    $i = 0;
    $list = '<ul>';

    while($i < count($json)){
        $list .= '<li>' . $json[$i]->name;
        $i++;
    }

    $list .= '</ul>';

    /* CREATE ANOTHER PHP OBJECT TO STORE THE MASTERSTATUS AND THE LIST, THEN ENCODE THE OBJECT (PUT IT INTO A STRING) AND SEND IT TO THE BROWSER */
    $response = (object) [
        'masterstatus' => 'success',
        'list' => $list,
    ];
    echo json_encode($response);
?>