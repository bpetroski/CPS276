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
            'msg' => 'no names found.',
        ];
        echo json_encode($response); 
        exit; /* BECAUSE WE DON'T WANT TO GO ANY FURTHER WITH THIS OPERATION TERMINATE IT HERE */
    }

    $i = 0;
    $names = '<div>';

    while($i < count($json)){
        $names .= '<p>' . $json[$i]['name']."</p>";
        $i++;
    }
    $names .= '</div>';

    /* CREATE ANOTHER PHP OBJECT TO STORE THE MASTERSTATUS AND THE LIST, THEN ENCODE THE OBJECT (PUT IT INTO A STRING) AND SEND IT TO THE BROWSER */
    $response = (object) [
        'masterstatus' => 'success',
        'names' => $names,
    ];
    echo json_encode($response);
?>
