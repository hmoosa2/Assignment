<?php
session_start();
 //if (!isset($_SESSION['login'])) // if you aren't logged in
   //     {
	//		header("Location: login.php"); // you will be sent to log in
		// }

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

include 'connect.php';

if (!isset( $_POST['submit'] )) {
    echo "<p>ERROR form was not submitted</p>";
}
else {
	$hashpw = password_hash($_POST['pass'], PASSWORD_BCRYPT); // scrambles whatever is inputted into the password box with BCRYPT cypher
    $sql = "insert into users (firstname, lastname, email, Admin, password) values (?,?,?,?,?)"; // this is a SQL query which inserts everything inputted into the form into the table (columns must be placed here in the same order they're in as the phpmyadmin table
    $stmt = $mysqli->prepare($sql); // prepares the SQL query above
    $stmt->bind_param('sssss', $_POST['fname'], $_POST['sname'], $_POST['email'], $_POST['admin'] ,$hashpw); // brings all inputted data together (must also be in order like the phpmyadmin table)
    if (!$stmt->execute()) { // if the SQL query isnt executed, the program will bring up an error likely with the above code
        echo "Error: ". $mysqli->error;
    }
    else { // if the SQL query goes through, we are given a link to the Display page
        echo "<p>Successfully Added Record</p>";
        echo "<a class=\"nav-link\" href=\"Display.php\">Back</a>";
    } 
    $mysqli->close();
}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Add user</title>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel = "stylesheet" href = "Assignment.css">
</head>
<?php include 'nav.php'?>
<body>
	<div class = "row justify-content-center">
		<div class ="container">
<h1>Add record:</h1>
<br>
<form action="newuser.php" method="post" >
   
        <div class="form-group">
        <input type="text" name="fname" class = "form-control" id="fname">
        </div>
   
   <div class="form-group">
   <input type="text" name="sname" class = "form-control" id="sname">
   </div>
   
   <div class="form-group">
        <input type="text" name="email" class = "form-control" id="email">
   </div>
   
   <div class="form-group">
        <input type="text" name="pass" class = "form-control" id="pass">
   </div>
   Admin: <br><input type = "checkbox" id="admin" name="admin" value = "1"/></br>
   <div class="form-group">
		<button type="submit" class="btn btn-primary" name="submit" id="submit" value="submit">Submit</button>
	</div>
</form>
</div>
</div>
</body>
</html>
