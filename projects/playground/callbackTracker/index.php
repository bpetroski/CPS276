<?php
    require_once 'Classes/navHeader.php';
    $navBar = new navHeader();

    $output = "<br>";
    if(isset($_POST["submitBtn"])){
        require_once "Classes/Customer.php";
        $newCx = new Customer();
        $output .= $newCx->testOutput();
    }
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
        <?php echo $navBar->nav("Callback Tool"); ?>

        <main class="container">
            <form name="phone-numbers" action="index.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="phone-number">Phone Number</label>
                    <input type="integer" class="form-control" name="phone-number" id="phone-number">
                </div>
                <div class="form-group"> 
                    <p>Is this person currently a customer?</p>
                    <label for="existing-customer">Yes</label>
                    <input type="radio" name="currentCx" id="existing-customer" value=true>

                    <label for="new-customer">No</label>
                    <input type="radio" name="currentCx" id="new-customer" value=false checked>

                </div>
                <div class="form-group">
                <p>Was the customer interested in our services?</p>
                <label for="interested">Yes</label>
                <input type="radio" name="call-result" id="interested" value="interested" checked>

                <label for="un-interested">No</label>
                <input type="radio" name="call-result" id="un-interested" value="un-interested">

                <label for="voicemail">Voicemail</label>
                <input type="radio" name="call-result" id="voicemail" value="voicemail">
                </div>
                <div class="form-group">
                    <label for="quoted-product">What did you offer?</label>
                    <input type="text" class="form-control" name="quoted-product" id="quoted-product">
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submitBtn" id="submitBtn" value="Submit">
                    <p><?php echo $output ?></p>
                </div> 
                <br><br><br>   
            </form>
        </main>
    </body>
</html> 