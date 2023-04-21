<?php

    require_once('classes/StickyForm.php');
    $stickyForm = new StickyForm();


    function init(){
        global $elementsArr, $stickyForm;
      
        if(isset($_POST['login'])){
            $postArr = $stickyForm->validateForm($_POST, $elementsArr);
            if($postArr['masterStatus']['status'] == "noerrors"){
                return addData($_POST);
            }
            else{
                return getForm("",$postArr);
            }
        }
        else {
            return getForm("", $elementsArr);
        } 
    }

   $elementsArr = [
	"masterStatus"=>[
	  "status"=>"noerrors",
	  "type"=>"masterStatus"
	],
	"email"=>[
	  "type"=>"text",
	  "value"=>"" 
	],
	"password"=>[
	  "type"=>"text",
	  "value"=>""
	]
   ];


    function getForm($acknowledgement, $elementsArr){
        global $stickyForm;

        $loginForm=<<<HTML
            <h1>Login</h1>
            <form name="login" action="index.php" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="form-group padtop">
                    <input type="submit" class="btn btn-primary" name="login" id="login" value="Log In">
                </div> 
            </form>
        HTML;   
        return [$acknowledgement, $loginForm];
    }

?>    
