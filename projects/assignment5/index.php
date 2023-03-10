<?php

    $output = "<br>";
    if(isset($_POST["submitBtn"])){
        require_once "Directories.php";
        $newDir = new Directories();
        // $output = $newDir->testInput();
        $output .= $newDir->createDir();
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Directory Creator</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>File and Directory Assignment</h1>
            <p>Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only.</p>
            <p><?php echo $output ?></p>
            <form name="Directories" action="index.php" method="post">
                <div class="form-group">
                    <label for="name-input">Folder Name:</label>
                    <input type="text" class="form-control" name="name-input" id="name-input" value="">
                </div>
                <br>
                <div class="form-group">
                    <label for="text-input">File Content:</label>
                    <textarea style="height: 250px;" class="form-control"id="text-input" name="text-input"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submitBtn" id="submitBtn" value="Submit">
                </div>
            </form>
        </div>
        
    </body>
</html> 