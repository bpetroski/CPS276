<?php

class navHeader {

    public function nav($header){
        $nav = <<<NAV

        <header style="background-color: #333; color: #fff;">
            <div class="container">
                <nav class="nav-header">
                    <ul>
                        <li><a href="newCallback.php">New Callback</a></li>
                        <li><a href="callbacksPage.php">Outbound Calls</a></li>
                        <li><a href="addAdmin.php">Add Admin</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </nav>
                <div class="logo-container"> 
                    <div style="padding-right: 15px;">
                        <a href="https://russet-v8.wccnet.edu/~bjpetroski/projects/playground" target="_self"> <img src="../src/tmo-logo-v4.svg" alt="T-Mobile"></a> 
                    </div> 
                    <div class="header-text">
                        <h1>$header</h1>
                        <div class="nav-header" style="padding: 1px;">
                            <a href='https://github.com/bpetroski'>Web App by Brenden Petroski</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <br>
        NAV;
        return $nav;
    }

    public function head($title="title"){
        $head = <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>$title</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="../CSS/navHeader.css">
            <link rel="stylesheet" type="text/css" href="../CSS/formGroupFormatting.css">
        </head>
        HTML;
        return $head;
    }

    public function security(){
        session_start();
        if($_SESSION['access'] !== "accessGranted"){header('location: index.php');}
    }

}