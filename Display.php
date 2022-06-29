<?php
include 'nav.php';
include 'connect.php';

 session_start();
 if (!isset($_SESSION['login'])) //if you aren't logged in
        {
			header("Location: login.php"); // you will be sent to log in
		}

$sql = "SELECT ID, firstname, lastname, email FROM users"; // sql query to select the labelled columns FROM the selected table
$result = $mysqli->query($sql); //

if ($result){ //if there is any result, a table for the data will be made
	if ($result->num_rows > 0){
		echo "<table class=\"table\">";
		echo "<table class=\"thead-dark\">";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Firstname</th>";
		echo "<th>Surname</th>";
		echo "<th>Email</th>";
		echo "</tr>";
		echo "</thead>";
		while ($row = $result->fetch_assoc()) // and whilst the program picks up rows it will put the table data in the appropriate columns
		{
			echo "<tr>";
			echo "<td>".$row ['ID']."</td>"	;		
			echo "<td>".$row ['firstname']."</td>";		
			echo "<td>".$row ['lastname']."</td>";		
			echo "<td>".$row ['email']."</td>"	;
			echo  '<td> <a href="edit.php?id='.$row["ID"].'">Edit</a></td>';		//allows you to edit the the firstname, surname and email of any user with an ID	
			echo  '<td> <a href="delete.php?id='.$row["ID"].'">Delete</a></td>';	//allows you to delete any user with an ID
			echo "</tr>";
		}
		echo "</table>";
	} 
	else{
		echo "0 results"; //otherwise if there is no data to output then the program is left to output 0 results
		}
		$result->close();
		$mysqli->close();
}
?>
<div class="container">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>untitled</title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<link rel = "stylesheet" href = "Assignment.css">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.32" />
</head>

<body>
	</div>
</body>

</html>
