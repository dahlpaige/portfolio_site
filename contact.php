<?php include_once "includes/html-top.php"; ?>
<?php include_once "includes/header.php"; ?>
<?php include_once "includes/connection.php"; 

// SQL STATEMENT

$sql="SELECT contact.firstName"
. " FROM contact"
. " ORDER BY contact.firstName;";
     
// Display SQL for learning and trouble-shooting
     
//echo "<br>2. SQL: " . $sql . "<br>";

// RUN QUERY
     
try {
     $result = $connection->query($sql);
     //echo "3. Query succeeded! " . $result->rowCount() . " rows returned.<br>";
} 
catch (PDOException $e) {
     die("Query failed! " . $e->getMessage());
}

?>

<main>
	<!----- SECTION ----->
	<section class="container">
		<!-- row 1 -->
		<div class="row">
			<h4>Have a question? Send me a message!</h4>
		</div>
		<!-- /row 1 -->
		<!-- row 2 -->
		<div class="row">
			<form method="post" action="contact_action.php">
				<div class="form-group">
					<label for="firstName">First Name</label>
					<input type="text" class="form-control" name="firstName" id="firstName">
				</div>
				<div class="form-group">
					<label for="lastName">Last Name</label>
					<input type="text" class="form-control" name="lastName" id="lastName">
				</div>
					<div class="form-group">
					<label for="emailAddress">Email</label>
					<input type="email" class="form-control" name="emailAddress" id="emailAddress">
				</div>
					<div class="form-group">
					<label for="commentArea">Comment</label>
					<textarea class="form-control" name="commentArea" id="commentArea" rows="3"></textarea>
				</div>
			<div class="row">
			<button type="submit" class="btn btn-lg">Send!</button>
		</div>
			</form>
		</div>
		<!-- /row 2 -->
	</section>
	<!----- END ----->
	
</main>

<?php include_once "includes/footer.php"; ?>