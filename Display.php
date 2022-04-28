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
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.32" />
</head>

<body>
	</div>
</body>

</html>
