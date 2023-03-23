<?php

if (isset( $_POST["upload-pdf"])){
    processFile();
}
else {
    $output = "<br>";
}

function displayThanks() {
        
    return <<<HTML
        <p>Thanks for uploading your PDF : {$_POST['name-input']} !</p>
        <br>
    HTML;
        
}

function processFile(){

    global $output;

    if ($_FILES["pdf-file"]["error"] == 4){
        $output = "<p>No file was uploaded. Make sure you choose a file to upload.</p>";
    }

    elseif($_FILES["pdf-file"]["size"] > 100000 || $_FILES["pdf-file"]["error"] == 1){
        $output = "<p>The PDF is too large</p>";
    }

    elseif ($_FILES["pdf-file"]["type"] != "application/pdf") {
        $output = "<p>PDFs only, thanks!</p>";
    }

    elseif (!move_uploaded_file( $_FILES["pdf-file"]["tmp_name"], "PDF/" . $_FILES["pdf-file"]["name"])){
            $output = "<p>Sorry, there was a problem uploading that PDF.</p>";
    }
    else {
        // upload file to database with crud	
        $output = displayThanks();
    }

}