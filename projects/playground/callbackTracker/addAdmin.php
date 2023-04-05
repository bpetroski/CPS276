<?php
    require_once 'Classes/navHeader.php';
    $navBar = new navHeader();
    echo $navBar->security();
    echo $navBar->head("Add Admin");
    $output="";

    if(isset($_POST['create-admin'])){
        require_once 'Classes/Admin.php';
        $admin = new Admin();
        $output = $admin->addAdmin($_POST);
    }
?>
    <body>
        <?php echo $navBar->nav("Add Admin")?>;
        <main class="container">
            <p>Enter a username and password to create a new administrator.</p>
            <p><?php echo $output ?></p>
            <form name="add_admin" action="addAdmin.php" method="post">
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
                    <input type="submit" class="btn btn-primary" name="create-admin" id="create-admin" value="Create Admin">
                </div> 
            </form>
        </main>
    </body>
</hmtl>