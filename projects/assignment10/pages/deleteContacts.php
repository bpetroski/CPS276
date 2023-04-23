<?php
    require_once 'classes/StickyForm.php';
    $stickyForm = new StickyForm(); $stickyForm->security();

    function init(){
        require_once 'classes/Pdo_methods.php';
        $pdo = new PdoMethods(); 
        $output = ""; $msg = "";
        $sql = "SELECT * FROM contacts";
        $records = $pdo->selectNotBinded($sql);

        if(isset($_POST['delete'])){
            if(isset($_POST['chkbx'])){
                $error = false;
                foreach($_POST['chkbx'] as $id){
                    $pdo = new PdoMethods();
                    $sql = "DELETE FROM contacts WHERE contact_id=:id";
                    $bindings = [[':id', $id, 'int'],];
    
                    $result = $pdo->otherBinded($sql, $bindings);
                    if($result === 'error'){
                        $msg = "<p>its broken</p>";
                        $error = true; break;
                    }else{
                        $msg = "<p>Contact Deleted</p>";
                    }
                }
            }
            header('Location: index.php?page=deleteContacts');
        }    

        if(count($records) === 0){
            $output = "<p>There are no records to display</p>";
            return [$output,""];
        }else{
            $output = "<form method='post' action='index.php?page=deleteContacts'>";
            $output .= "<input type='submit' class='btn btn-danger' name='delete' value='Delete'/><br><br>
            <table class='table table-striped table-bordered'>
                <thead><tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Contact</th>
                    <th>Age</th>
                    <th>Delete</th>
            </tr></thead><tbody>";

            foreach($records as $row){
                $output .= "<tr>
                <td>{$row['contact_name']}</td>
                <td>{$row['contact_address']}</td>
                <td>{$row['contact_city']}</td>
                <td>{$row['contact_state']}</td>
                <td>{$row['contact_phone']}</td>
                <td>{$row['contact_email']}</td>
                <td>{$row['contact_DOB']}</td>
                <td>{$row['contact_contacts']}</td>
                <td>{$row['contact_age']}</td>
                <td><input type='checkbox' name='chkbx[]' value='{$row['contact_id']}' /></td></tr>";
            }

            $output .= "</tbody></table></form>";

/*             if(isset($error)){
                if($error){
                    $msg = "<p>Could not delete the contact(s)</p>";
                }
                else {
                    $msg = "<p>Contact(s) deleted</p>";
                }
            }
            else {
                $msg="";
            } */
            return [$msg, $output];

        }        
    }
?>    
