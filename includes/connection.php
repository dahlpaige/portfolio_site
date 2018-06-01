<?php

// Define constants for database connections
$servername = "localhost:3306";
$username = "paigedah_admin";
$password = "Password1234";

// Create a database connection

try {
     // 1. Create a database connection
     $connection = new PDO("mysql:host=$servername;dbname=paigedah_portfolio_contactform", $username, $password);
     // Turn on display of errors (exceptions) so we can see problems if they occur
     $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // Display message on successful connection
     //echo "1. Database connection succeeded!";
} 
catch (PDOException $e) {
     die("Database connection failed: " . $e->getMessage());
}

?>