<?php

    $myname = "Brenden Petroski";
    $testclass = new AddNamesProc();
    $output = "";

    require_once 'addNameProc.php';
    $testclass->formatName($myname);

    if(count($_POST) > 0){
        require_once 'addNameProc.php';
        $addName = new AddNamesProc();
        $output = $addName->addClearNames();
    }    

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Name List</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <p><?php echo $myname ?></p>
        <div class="container">
            <h1>Add Names</h1>
            <form action="addNameProc.php" method="post">
                <div class="form-group">
                    <button type="button" class="btn btn-primary" name="Add-Names" id="add-name-btn">Add Name</button>
                    <button type="button" class="btn btn-primary" name="Clear-Names" id="clear-names-btn">Clear Names</button>
                </div>
                <div class="form-group">
                    <label for="name-input">Enter Name:</label>
                    <input type="text" class="form-control" id="name-input">
                </div>
                <div class="form-group">
                    <label for="namelist">List of Names:</label>
                    <textarea style="height: 500px;" class="form-control"id="namelist" name="namelist"><?php echo $output ?></textarea>
                </div>
            </form>
        </div>
        
    </body>
</html> 
