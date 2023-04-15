<?php

    require_once('classes/StickyForm.php');
    $stickyForm = new StickyForm();

    

    $loginForm=<<<HTML
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
                    <input type="submit" class="btn btn-primary" name="login" id="login" value="Log In">
                </div> 
            </form>
    HTML;

    function init(){
        return ["<h1>Login</h1>", $loginForm];
    }
?>    