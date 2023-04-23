<?php
    require_once 'classes/StickyForm.php';
    $stickyForm = new StickyForm(); $stickyForm->security();

    function init(){
        return ["<h1>Welcome</h1>","<p>Welcome the sticky form mod application.  Click one of the lines above</p>"];
    }
?>    