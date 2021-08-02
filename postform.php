<?php 
# Include script to make a database connection
include("connect.php");
# Check if input fileds are empty
if(empty($_POST['fname']) && empty($_POST['lname']) && empty($_POST['email']) && empty($_POST['address']) && empty($_POST['phonenumber']) && empty($_POST['country']) && empty($_POST['birthday'])){
    # If the fields are empty, display a message to the user
    echo "Please fill in the fields";
# Process the form data if the input fields are not empty
}else{
    $fname= $_POST['fname'];
    
    echo ('Your Name is:     '. $fname. '<br/>');
   
    # Insert into the database
    $query = "INSERT INTO user(fname,lname,email,address,phonenumber,country,birthday) VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[address]','$_POST[phonenumber]','$_POST[country]','$_POST[birthday]')";
    if (mysqli_query($conn, $query)) {
        echo "New record created successfully !";
    } else {
         echo "Error inserting record: " . $conn->error;
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
    <form method="post" action="postform.php">
        First Name: <input type="text" name="fname"><br><br/>
		
		Last Name: <input type="text" name="lname"><br><br/>
		
        Email: <input type="text" name="email"><br><br/>
		
        Address: <input type="text" name="address"><br><br/>
		
		Phone Number: <input type="tel" name="phonenumber"><br><br/>
		
		Country: <input type="text" name="country"><br><br/>
		
		Dob: <input type="date" name="birthday"><br><br/>
        <br/>
        <input type="submit" name="save" value="submit" >
    </form>

    <h1>Inserted Data In Database</h1>

<?php
# Read from the database and display in the table
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