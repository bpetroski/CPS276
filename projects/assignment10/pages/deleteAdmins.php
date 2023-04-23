<?php
    require_once 'classes/StickyForm.php';
    $stickyForm = new StickyForm(); $stickyForm->security();
    
    function init(){
        return ["<h1>Delete Admins</h1>","<p>this is the page where you - delete admins</p>"];
    }
?>    