<?php

$path = "index.php?page=welcome";

$css=<<<css
<style>
.nav-header {
	display: flex;
	padding: 10px;
    list-style: none;
}

.nav-header ul {
	display: flex;
	margin: 0;
	padding: 0;
}

.nav-header li {
	margin-right: 20px;
}
</style>
css;

$nav=<<<HTML
    $css
    <nav>
        <ul class="nav-header">
            <li><a href="index.php?page=addContact">Add Contact</a></li>
            <li><a href="index.php?page=deleteContacts">Delete contact(s)</a></li>  
            <li><a href="logout.php">Logout</a></li>   
        </ul>
    </nav>
HTML;

$adminNav=<<<HTML
    $css
    <nav>
        <ul class="nav-header">
            <li><a href="index.php?page=addContact">Add Contact</a></li>
            <li><a href="index.php?page=deleteContacts">Delete contact(s)</a></li>    
            <li><a href="index.php?page=addAdmin">Add Admin</a></li>
            <li><a href="index.php?page=deleteAdmin">Delete Admin(s)</a></li> 
            <li><a href="logout.php">Logout</a></li>    
   
        </ul>
    </nav>
HTML;

if(isset($_GET)){
    if($_GET['page'] === "welcome"){
        require_once('pages/welcome.php');
        $result = init();
    }

    else {
        header('location: '.$path);
    }
}

else {
    header('location: '.$path);
}



?>