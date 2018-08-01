<?php  
	
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ecommerce";

$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

if ($conn->connect_errno > 0) {
	die("Unable to connect to database [".$conn->connect_error."]");
}

?>