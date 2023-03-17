<?php

    $output = "<br>";
    if(isset($_POST["submitBtn"])){
        require_once "Customer.php";
        $newCx = new Customer();
        $newCx->setPhoneNumber(2484729888);
        $output .= $newCx->getPhoneNumber();
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

    </head>
    <body>
        <header style="background-color: #333; color: #fff;">
            <div class="container">
                <nav class="nav-header">
                    <ul>
                        <p style="padding-right: 75px;"></p>    
                        <li><a href="">New Callback</a></li>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                    </ul>
                </nav>
                <div class="logo-container"> 
                    <div style="padding-right: 15px;">
                        <a href="https://russet-v8.wccnet.edu/~bjpetroski/projects/playground" target="_self"> <img src="../src/tmo-logo-v4.svg" alt="T-Mobile"></a> 
                    </div> 
                    <div class="header-text">
                        <h1>Callback Tool</h1>
                        <p>Web App by Brenden Petroski</p>
                    </div>
                </div>
            </div>
        </header>
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
                    <input type="submit" class="btn btn-primary" name="submitBtn" id="submitBtn" value="Submit">
                    <p><?php echo $output ?></p>
                </div>    
            </form>
        </main>
    </body>
</html> 