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

        <style>
            div.form-group > * {
            margin-bottom: 10px; /* adds 10 pixels of margin below each child element within the div with the class form-group */
            }

            div.form-group > :last-child {
            margin-bottom: 0; /* removes the bottom margin from the last child element within the div with the class form-group */
            }
            input[type="radio"]{margin: 0 10px 0 0;}
        </style>


    </head>
    <body>
        <?php echo $navBar->nav("Outbound Calls"); ?>
        <main class="container">

        </main>
    </body>
</html> 