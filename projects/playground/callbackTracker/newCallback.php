<?php
    require_once 'Classes/navHeader.php';
    $navBar = new navHeader();
    echo $navBar->security();
    echo $navBar->head("New Callback");
    $output = "";
    if(isset($_POST["submitBtn"])){
        require_once "Classes/Customer.php";
        $newCx = new Customer();
        $output .= $newCx->sendToDatabase();
        $output .= $newCx->testOutput(); // rm when database stuff works
    }

    
?>
    <body>
        <?php echo $navBar->nav("Callback Tool"); ?>
        <main class="container">
            <form name="phone-numbers" action="newCallback.php" method="post">
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
                    <input type="radio" name="currentCx" id="existing-customer" value=1>

                    <label for="new-customer">No</label>
                    <input type="radio" name="currentCx" id="new-customer" value=0 checked>

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
                    <!-- change this ^^ to a list of stuff to choose from. -->
                </div>
                <div class="form-group">
                    <label for="other-info">Other Info</label>
                    <textarea class="form-control" name="other-info" id="other-info"></textarea>
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