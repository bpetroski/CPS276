<?php
    require_once 'Classes/fileUploadProc.php';
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PDF Upload</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>File Upload</h1>
            <a href="pdfPage.php">Show File List</a>
            <form name="PDF Files" action="index.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name-input">File Name:</label>
                    <input type="text" class="form-control" name="name-input" id="name-input" value="">
                </div>
                <br>
                <div class="form-group">
                    <input type="file" name="pdf-file" id="pdf-file">
      	        </div>
                <?php echo $output ?>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="upload-pdf" id="upload-pdf" value="Upload File">
                </div>
            </form>
        </div>
        
    </body>
</html> 