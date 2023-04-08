<?php

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Display Notes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="public/css/main.css">
    </head>
    <body>
        <div class="container">
            <h1>Display Notes</h1>
            <a href="index.php">Add Note</a>
            <form name="date-range" action="displayNotes.php" method="post">
                <br>
                <div class="form-group">
                    <label for="begDate">Beginning Date</label>
                    <input type="date" class="form-control" id="begDate" name="begDate">
                </div>
                <div class="form-group">
                    <label for="endDate">Ending Date</label>    
                    <input type="date" class="form-control" id="endDate" name="endDate">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="add-note" id="add-note" value="Add Note">
                </div>
            </form>
        </div>    
    </body>
</html>