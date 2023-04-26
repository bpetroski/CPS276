 <?php

require_once('classes/StickyForm.php');
$stickyForm = new StickyForm(); $stickyForm->security();

function init(){
  global $elementsArr, $stickyForm;

  if(isset($_POST['submit'])){
    /*THIS METHODS TAKE THE POST ARRAY AND THE ELEMENTS ARRAY (SEE BELOW) AND PASSES THEM TO THE VALIDATION FORM METHOD OF THE STICKY FORM CLASS.  IT UPDATES THE ELEMENTS ARRAY AND RETURNS IT, THIS IS STORED IN THE $postArr VARIABLE */
    $postArr = $stickyForm->validateForm($_POST, $elementsArr);
    /* THE ELEMENTS ARRAY HAS A MASTER STATUS AREA. IF THERE ARE ANY ERRORS FOUND THE STATUS IS CHANGED TO "ERRORS" FROM THE DEFAULT OF "NOERRORS".  DEPENDING ON WHAT IS RETURNED DEPENDS ON WHAT HAPPENS NEXT.  IN THIS CASE THE RETURN MESSAGE HAS "NO ERRORS" SO WE HAVE NO PROBLEMS WITH OUR VALIDATION AND WE CAN SUBMIT THE FORM */
    if($postArr['masterStatus']['status'] == "noerrors"){
      /*addData() IS THE METHOD TO CALL TO ADD THE FORM INFORMATION TO THE DATABASE (NOT WRITTEN IN THIS EXAMPLE) THEN WE CALL THE GETFORM METHOD WHICH RETURNS AND ACKNOWLEDGEMENT AND THE ORGINAL ARRAY (NOT MODIFIED). THE ACKNOWLEDGEMENT IS THE FIRST PARAMETER THE ELEMENTS ARRAY IS THE ELEMENTS ARRAY WE CREATE (AGAIN SEE BELOW) */
      return addData($_POST);
    }
    else{
      /* IF THERE WAS A PROBLEM WITH THE FORM VALIDATION THEN THE MODIFIED ARRAY ($postArr) WILL BE SENT AS THE SECOND PARAMETER.  THIS MODIFIED ARRAY IS THE SAME AS THE ELEMENTS ARRAY BUT ERROR MESSAGES AND VALUES HAVE BEEN ADDED TO DISPLAY ERRORS AND MAKE IT STICKY */
      return getForm("",$postArr);
    }
  }
  /* THIS CREATES THE FORM BASED ON THE ORIGINAL ARRAY THIS IS CALLED WHEN THE PAGE FIRST LOADS BEFORE A FORM HAS BEEN SUBMITTED */
  else {
      return getForm("", $elementsArr);
    } 
}

/* THIS IS THE DATA OF THE FORM.  IT IS A MULTI-DIMENTIONAL ASSOCIATIVE ARRAY THAT IS USED TO CONTAIN FORM DATA AND ERROR MESSAGES.   EACH SUB ARRAY IS NAMED BASED UPON WHAT FORM FIELD IT IS ATTACHED TO. FOR EXAMPLE, "NAME" GOES TO THE TEXT FIELDS WITH THE NAME ATTRIBUTE THAT HAS THE VALUE OF "NAME". NOTICE THE TYPE IS "TEXT" FOR TEXT FIELD.  DEPENDING ON WHAT HAPPENS THIS ASSOCIATE ARRAY IS UPDATED.*/
$elementsArr = [
  "masterStatus"=>[
    "status"=>"noerrors",
    "type"=>"masterStatus"
  ],
	"name"=>[
    "errorMessage"=>"<span class='errorMsg'>Name cannot be blank and must be a standard name</span>",
      "errorOutput"=>"",
      "type"=>"text",
      "value"=>"Brenden Petroski",
      "regex"=>"name"
	],
	"phone"=>[
    "errorMessage"=>"<span class='errorMsg'>Phone cannot be blank and must be formatted as 999.999.9999</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"999.999.9999",
    "regex"=>"phone"
  ],

  "address"=>[
    "errorMessage"=>"<span class='errorMsg'>Address cannot be blank and must be a valid address</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"123 Main Street",
    "regex"=>"address"
  ],

  "city"=>[
    "errorMessage"=>"<span class='errorMsg'>Please enter in a valid, non-blank city name</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"Brighton",
    "regex"=>"name"
  ],
   
  "state"=>[
    "type"=>"select",
    "options"=>["mi"=>"Michigan","oh"=>"Ohio","pa"=>"Pennslyvania","tx"=>"Texas"],
		"selected"=>"mi",
		"regex"=>"name"
	],
  
  "email"=>[
    "errorMessage"=>"<span class='errorMsg'>Please enter in a valid, non-blank email</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"bjpetroski@wccnet.edu",
    "regex"=>"email" 
  ],

  "date"=>[
    "errorMessage"=>"<span class='errorMsg'>Please enter in a valid, non-blank city name</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"07/11/2001",
    "regex"=>"date"
  ],

  "contactMethod"=>[
    "errorMessage"=>"<span class='errorMsg'>There was an error</span>",
    "errorOutput"=>"",
    "type"=>"checkbox",
    "action"=>"none",
    "status"=>["Newsletter"=>"", "Email"=>"", "SMS"=>""]
  ],
  "ageGroup"=>[
    "errorMessage"=>"<span class='errorMsg'>You must select at least one age group option</span>",
    "errorOutput"=>"",
    "action"=>"required",
    "type"=>"radio",
    "value"=>["10-18"=>"", "19-30"=>"checked", "30-50"=>"", "51+"=>""]
  ]
];

/*THIS FUNCTION CAN BE CALLED TO ADD DATA TO THE DATABASE */
function addData($post){
  global $elementsArr;   
  require_once('classes/Pdo_methods.php');
  $pdo = new PdoMethods();

  $sql = "INSERT INTO contacts (contact_name, contact_address, contact_city, contact_state, contact_phone, contact_email, contact_DOB, contact_contacts, contact_age) VALUES (:name, :address, :city, :state, :phone, :email, :DOB, :contacts, :age)";

  if(isset($post['contactMethod'])){
    $contactMethods = "";
    foreach($post['contactMethod'] as $v){
      $contactMethods .= $v."<br>";
    }
    // $contactMethods = substr($contactMethods, 0,-1);
  }else{
    $contactMethods = "no contact";
  }

  $bindings = [
    [':name',$post['name'],'str'],
    [':address',$post['address'],'str'],
    [':city',$post['city'],'str'],
    [':state',$post['state'],'str'],
    [':phone',$post['phone'],'str'],
    [':email',$post['email'],'str'],
    [':DOB',$post['date'],'str'],
    [':contacts',$contactMethods,'str'],
    [':age',$post['ageGroup'],'str']
  ];

  $result = $pdo->otherBinded($sql, $bindings);

  if($result == "error"){
    return getForm("<p class='errorMsg'>There was an error processing your form</p>", $elementsArr);
  }else{
    return getForm("<p class='successMsg'>Contact Information Added</p>", $elementsArr);
  }   
}

/*THIS IS THEGET FROM FUCTION WHICH WILL BUILD THE FORM BASED UPON UPON THE (UNMODIFIED OF MODIFIED) ELEMENTS ARRAY. */
function getForm($acknowledgement, $elementsArr){
  global $stickyForm;
  $options = $stickyForm->createOptions($elementsArr['state']);

  /* THIS IS A HEREDOC STRING WHICH CREATES THE FORM AND ADD THE APPROPRIATE VALUES AND ERROR MESSAGES */
  $form = <<<HTML
      <form method="post" action="index.php?page=addContact">
      <div class="form-group"> <!-- name input -->
        <label for="name">Name (letters only){$elementsArr['name']['errorOutput']}</label>
        <input type="text" class="form-control" id="name" name="name" value="{$elementsArr['name']['value']}" >
      </div>
      <div class="form-group"> <!-- street address input -->
        <label for="address">Address (just number and street) {$elementsArr['address']['errorOutput']}</label>
        <input type="text" class="form-control" id="address" name="address" value="{$elementsArr['address']['value']}">
      </div>
      <div class="form-group"> <!-- city input -->
        <label for="city">City {$elementsArr['city']['errorOutput']}</label>
        <input type="text" class="form-control" id="city" name="city" value="{$elementsArr['city']['value']}">
      </div>   
      <div class="form-group"> <!-- state selector -->
        <label for="state">State</label>
        <select class="form-control" id="state" name="state">
          $options
        </select>
      </div>
      <div class="form-group"> <!-- phone input -->
        <label for="phone">Phone {$elementsArr['phone']['errorOutput']}</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{$elementsArr['phone']['value']}" >
      </div>
      <div class="form-group"> <!-- email input -->
        <label for="email-address">Email {$elementsArr['email']['errorOutput']}</label>
        <input type="text" class="form-control" id="email" name="email" value="{$elementsArr['email']['value']}" >
      </div>
      <div class="form-group">  <!-- DOB -->
        <label for="DOB">Date of Birth (MM/DD/YYYY) {$elementsArr['date']['errorOutput']}</label>
        <input type="text" class="form-control" id="date" name="date" value="{$elementsArr['date']['value']}">
      </div>
      <p>Please check all contact options (optional):{$elementsArr['contactMethod']['errorOutput']}</p>
      <span> <!--contact method checkboxes-->
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="contactMethod[]" id="contactMethod1" value="Newsletter" {$elementsArr['contactMethod']['status']['Newsletter']}>
          <label class="form-check-label" for="contactMethod1">Newsletter</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="contactMethod[]" id="contactMethod2" value="Email" {$elementsArr['contactMethod']['status']['Email']}>
          <label class="form-check-label" for="contactMethod2">Email Updates</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="contactMethod[]" id="contactMethod3" value="SMS" {$elementsArr['contactMethod']['status']['SMS']}>
          <label class="form-check-label" for="contactMethod3">Text Updates</label>
        </div>
      </span>
      <p class="padtop">Please select an age range (you must select one): {$elementsArr['ageGroup']['errorOutput']}</p>
      <span> <!--age range radio-->
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="ageGroup" id="ageGroup1" value="10-18"  {$elementsArr['ageGroup']['value']['10-18']}>
          <label class="form-check-label" for="ageGroup1">10-18</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="ageGroup" id="ageGroup2" value="19-30"  {$elementsArr['ageGroup']['value']['19-30']}>
          <label class="form-check-label" for="ageGroup2">19-30</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="ageGroup" id="ageGroup3" value="30-50"  {$elementsArr['ageGroup']['value']['30-50']}>
          <label class="form-check-label" for="ageGroup3">30-50</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="ageGroup" id="ageGroup4" value="51+"  {$elementsArr['ageGroup']['value']['51+']}>
          <label class="form-check-label" for="ageGroup4">51+</label>
        </div>
      </span>
      <div class="padtop">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  HTML;

  /* HERE I RETURN AN ARRAY THAT CONTAINS AN ACKNOWLEDGEMENT AND THE FORM.  THIS IS DISPLAYED ON THE INDEX PAGE. */
  return [$acknowledgement, $form];
}
?>
