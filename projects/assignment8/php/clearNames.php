<?php
    require_once '../classes/Pdo_methods.php';
    $pdo = new PdoMethods();
    $sql = "TRUNCATE TABLE names";

    $result = $pdo->otherNotBinded($sql);

    if($result === 'error'){
        $response = (object)[
            'masterstatus'=>'error',
            'msg'=>"There was an error clearing the database"
        ];
    }else{
        $response = (object)[
            'masterstatus'=>'success',
            'msg'=>'Cleared the database.'
        ];
    }
    echo json_encode($response);
?>