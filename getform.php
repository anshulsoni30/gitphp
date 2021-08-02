<?php
# Include script to make a database connection
include("connect.php");
# Check if input fileds are empty
if(empty($_GET['fname']) && empty($_GET['lname']) && empty($_GET['email']) && empty($_GET['address']) && empty($_GET['phonenumber']) && empty($_GET['country']) && empty($_GET['birthday'])){
    # If the fields are empty, display a message to the user
    echo "Please fill in the fields";
    # Process the form data if the input fields are not empty
}else{
    $fname= $_GET['fname'];
    
    echo ('Welcome:     '. $fname. '<br/>');
   
    // Insert into the database
	$query = "INSERT INTO user(fname,lname,email,address,phonenumber,country,birthday) VALUES ('$fname','$lname','$email','$address','$phonenumber','$country','$birthday')";
	if (mysqli_query($conn, $query)) {
	    echo "New record created successfully !";
	} else {
	   echo "Error inserting record: " . $conn->error;
	}
}

# Button click to Delete
# Check that the input fields are not empty and process the data
if(!empty($_GET['delete']) && !empty($_GET['id'])){
	$query3 = "DELETE FROM user WHERE id='".$_GET['id']."' ";
    if (mysqli_query($conn, $query3)) {
	    echo "Record deleted successfully !";
	} else {
      # Display an error message if unable to delete the record
	     echo "Error deleting record: " . $conn->error;
	}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP FORMS</title>
</head>
<body>
    <h1>PHP Form</h1>
    <form method="get" action="getform.php">
         First Name: <input type="text" name="fname"><br><br/>
		
		Last Name: <input type="text" name="lname"><br><br/>
		
        Email: <input type="text" name="email"><br><br/>
		
        Address: <input type="text" name="address"><br><br/>
		
		Phone Number: <input type="tel" name="phonenumber"><br><br/>
		
		Country: <input type="text" name="country"><br><br/>
		
		Dob: <input type="date" name="birthday"><br><br/>
        <br/>
        <br/>
        <input type="submit" value="submit" >
    </form>
    <h1>Inserted Data In Database</h1>
<?php
// Read From the database and display in the table
$query2 = "SELECT * FROM user";
$result = $conn->query($query2);
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table id='tsa' border='1' id='example' class='table table-striped responsive-utilities table-hover'>
              <thead>
                <tr>
                <th>First Name</th>
               <th>Last Name</th>
			   <th>Email</th>
			   <th>Address</th>
			   <th>Phone Number</th>
			   <th>Country</th>
			   <th>DOB</th>
                 </tr>
              </thead>
              ";
    while($row = $result->fetch_assoc()) {
       echo "<tr",">",
           
            "<td>", $row["fname"],"</td>",
			"<td>", $row["lname"],"</td>",
            "<td>", $row["email"],"</td>",
			"<td>", $row["address"],"</td>",
			"<td>", $row["phonenumber"],"</td>",
			"<td>", $row["country"],"</td>",
			"<td>", $row["birthday"],"</td>", 
			  "</tr>";
	} 
    echo  "</table>";
}else {
 echo "No Records!";
}
?>
</body>
</html>