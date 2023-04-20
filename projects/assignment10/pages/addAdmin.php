<?php
require_once('classes/StickyForm.php');
$stickyForm = new StickyForm();

function init(){
  global $elementsArr, $stickyForm;

  if(isset($_POST['submit'])){
    $postArr = $stickyForm->validateForm($_POST, $elementsArr);
    if($postArr['masterStatus']['status'] == "noerrors"){
	return addData($_POST);
    }else{
	return getForm("", $postArr);
    }
  }else{
    return getForm("", $elementsArr);
  }
}

$elementsArr = [
  "masterStatus"=>[
    "status"=>"noerrors",
    "type"=>"masterStatus"
  ],
  "name"=>[
    "errorMessage"=>"<span class='errorMsg'>Name cannot be blank and must be a standard name</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"Brenden",
    "regex"=>"name"
  ],
  "email"=>[
    "errorMessage"=>"<span class='errorMsg'>Email must be valid</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"bjpetroski@wccnet.edu",
    "regex"=>"email"
  ]
];

function addData($post){
  global $elementsArr;
  require_once('classes/Pdo_methods.php');
  $pdo = new PdoMethods();

  $sql = "INSERT INTO admins (admin_name, admin_email, admin_password, admin_status) VALUES (:name, :email, :password, :status)";

  $bindings = [
    [':name',$post['name'],'str'],
    [':email',$post['email'],'str'],
    [':password',password_hash($post['password'], PASSWORD_DEFAULT),'str'],
    [':status',$post['status'],'str']
  ];

  $result = $pdo->otherBinded($sql, $bindings);

  if($result == "error"){
    return getForm("<p class='errorMsg'>There was a problem processing your form.</p>", $elementsArr);
  }else{
    return getForm("<p>Contact Information Added</p>", $elementsArr);
  }

}

function getForm($acknowledgement, $elementsArr){
  global $stickyForm;
//  $options = $stickyForm->createOptions($elementsArr['status']);

  $form = <<<HTML
    <h1>Add Admin</h1>
    <form name="addAdmin" method="post" action="index.php?page=addAdmin">
      <div class="form-group">
        <label for="name">Name (letters only){$elementsArr['name']['errorOutput']}</label>
        <input type="text" class="form-control" id="name" name="name" value="{$elementsArr['name']['value']}">
      </div>
      <div class="form-group">
        <label for="email">Email {$elementsArr['email']['errorOutput']}</label>
        <input type="text" class="form-control" id="email" name="email" value="{$elementsArr['email']['value']}">
      </div>
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  HTML;

  return [$acknowledgement, $elementsArr];
}

?>    
