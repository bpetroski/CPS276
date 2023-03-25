<?php
    require_once 'Classes/navHeader.php';
    require_once 'Classes/Crud.php';
    $navBar = new navHeader();
    $crud = new Crud();


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
        <?php echo $navBar->nav("Outbound Calls"); ?>
        <main class="container">

        </main>
    </body>
</html> 