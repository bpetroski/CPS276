
<?php

$i = 1;

$table = "<table border='1'>";

while ($i<=15){
    $table .= "<tr>";
    $j=1;
    while ($j <= 5){
        $table .= "<td>Row $i Cell $j</td>";
        $j++;
    }
    $i++;
    $table .= "</tr>";
}

$table .= "</table>";

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>exercise 3</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    </head>
        <body>
            <p><?php echo $table; ?></p>
        </body>
</html> 
