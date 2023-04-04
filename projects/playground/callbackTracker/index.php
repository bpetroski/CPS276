<?php
    require_once 'Classes/navHeader.php';
    $navBar = new navHeader();
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Callback Tool</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../CSS/navHeader.css">
        <link rel="stylesheet" type="text/css" href="../CSS/formGroupFormatting.css">

    </head>
    <body>
        <?php echo $navBar->nav("Callback Log In"); ?>
        <main class="container">
            <form name="login" action="index.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <br>
                    <input type="submit" class="btn btn-primary" name="submitBtn" id="submitBtn" value="Submit">
                </div> 
            </form>
        </main>
    </body>
</html> 