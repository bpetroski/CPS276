<?php

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Note</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="public/css/main.css">
    </head>
    <body>
        <div class="container">
            <h1>Add Note</h1>
            <a href="displayNotes.php">Display Notes</a>
            <form name="Notes" action="index.php" method="post">
                <br>
                <div class="form-group">
                    <label for="dateTime">Date and Time</label>
                    <input type="datetime-local" class="form-control" id="dataTime" name="dateTime">
                </div>
                <div class="form-group">
                    <label for="note-input">Note</label>
                    <textarea style="height: 250px;" class="form-control" name="note-input" id="note-input"></textarea>
      	        </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="add-note" id="add-note" value="Add Note">
                </div>
            </form>
        </div>    
    </body>
</html>