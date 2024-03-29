<?php
    require_once 'Classes/navHeader.php';
    $navBar = new navHeader();
    echo $navBar->head("Callback Log In");
    $output = "";

    if(isset($_POST['login'])){
        require_once 'Classes/Admin.php';
        $admin = new Admin();
        $output = $admin->login($_POST);
        echo $output;
        if($output === 'success'){
            header('Location: newCallback.php');
        }
    }
?>
    <body>
        <?php echo $navBar->nav("Callback Log In"); ?>
        <main class="container">
            <p><?php echo $output ?></p>
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
        </main>
    </body>
</html> 