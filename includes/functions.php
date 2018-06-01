<?php

function check_submitted($field_name, $field_type, &$missing_count) {

    // Check for undefined variable (not submitted) on all but checkbox
    if(!isset($_POST[$field_name])) { 
    
          $_POST[$field_name]=""; // set a default value if no value was submitted, to prevent errors
          
          if($field_type <> "checkbox") { // checkboxes usually don't have to be checked
               echo "Missing data for <strong>" . $field_name . "</strong>.<br />";
               $missing_count++;
          }
          
    }
    
    // For text, textarea, and select check for present but empty
    // Note use of elseif instead of if, which means only one of the 'if' blocks will run, not both.
    elseif($field_type == "text" || $field_type == "textarea" || $field_type == "select") { 
    
         if(trim($_POST[$field_name]) == "") {

              echo "Missing data for <strong>" . $field_name . "</strong>.<br />";
              $missing_count++;
    
         } // end if($_POST...)
         
    } // end if($field_type...)

} // end function 

function sanitize($field_name, $field_type, &$field_value) {

    if($field_type == "text" || $field_type == "textarea") {
     
         $field_value = trim($field_value);
         $field_value = stripslashes(strip_tags($field_value)); // strip html tags and back slashes
         $field_value = addslashes($field_value); // escapes quote marks so they will work in SQL statements
         $_POST[$field_name] = str_replace("/","",$field_value); // removes forward slashes
         
    }
     
}

function display_data() {

     echo "<div class='submitted'><h4>Thank you for filling out the form!<br />You submitted the following information:</h4></div><br />";
	
     foreach ($_POST as $key => $value) {
          echo "<div class='submitted'> <p><strong> $value </strong></p></div><br /><br />";
		
     }
	
}

?>