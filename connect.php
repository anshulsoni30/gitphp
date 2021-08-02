<?php 
	$servername = "localhost";
	$username = "Anshul"; # MySQL user
	$password = "80428a"; # MySQL Server root password
	$dbname='user'; # Database name
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    # Display an error mesage if the connection fails
	    die("Connection failed: " . $conn->connect_error);
	}
?>