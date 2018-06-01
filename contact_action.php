<?php 


include_once "includes/html-top.php";
include_once "includes/functions.php"; 
include_once "includes/header.php";

$missing_count = 0;

$form_fields=array();

$form_fields["firstName"]="text";
$form_fields["lastName"]="text";
$form_fields["emailAddress"]="email";
$form_fields["commentArea"]="textarea";

foreach ($form_fields as $key => $value) { // Loop through form fields. Key is the name of the field, value is type of field

     check_submitted($key, $value, $missing_count);

     sanitize($key, $value, $_POST[$key]); // ESPECIALLY IMPORTANT NOW THAT WE ARE INSERTING INTO A DATABASE
     
}

if($missing_count > 0) {

     echo "<br />Please <a href='contact.php'>Go Back</a> and fill in the missing data.<br /><br /></body></html>";
     exit;

}

else {
	echo "<section>";
	 display_data(); 
	echo "</section>";
}



// ASSIGN DATA TO VARIABLES FOR EASIER HANDLING


$firstName=$_POST["firstName"];
$lastName=$_POST["lastName"];
$emailAddress=$_POST["emailAddress"];
$commentArea=$_POST["commentArea"];


//Connect to Database
include_once "includes/connection.php";

//SQL

$sql="INSERT INTO contact(firstName, lastName, emailAddress, commentArea)"
. " VALUES('$firstName', '$lastName', '$emailAddress', '$commentArea');"; 

// Display SQL for learning and trouble-shooting
     
 //echo "<br>2. SQL: " . $sql . "<br>";

// RUN QUERY
     
// Run a query
try {
     $result = $connection->query($sql);
//      echo "3. Query succeeded! The new data was added.<br>";
} 
catch (PDOException $e) {
     die(" Query failed! " . $e->getMessage());
}

include_once "includes/smtp.php";

include_once "includes/footer.php";

?>

