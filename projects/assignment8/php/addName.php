<?php
    require_once '../classes/Pdo_methods.php';
    $data = json_decode($_POST['data']);
    $pdo = new PdoMethods();
    $sql = "INSERT INTO names (name) VALUES (:flname)";
    $binding = [[':flname',formatName($data->name),'str']];

    $result = $pdo->otherBinded($sql, $binding);
    
    if($result === 'error'){
        $response = (object)[
            'masterstatus'=>'error',
            'msg'=>"There was an error entering the name"
        ];
    }else{
        $response = (object)[
            'masterstatus'=>'success',
            'msg'=>'"'.$data->name.'"'.' was added to the database!'
        ];
    }
    echo json_encode($response);

    function formatName($name){
        // assume that the input contains the first and last name separated by a space
        $name_parts = explode(' ', trim($name));
        $first_name = ucfirst(strtolower($name_parts[0]));
        $last_name = ucfirst(strtolower($name_parts[count($name_parts) - 1]));
        return $last_name . ", " . $first_name;
    }
?>