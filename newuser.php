<?php
session_start();
 if (!isset($_SESSION['login'])) // if you aren't logged in
        {
			header("Location: login.php"); // you will be sent to log in
		}

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
</head>
<?php include 'nav.php'?>
<body>
	<div class="container">
<h1>Add record:</h1>
<form action="newuser.php" method="post" >
   Firstname: <br><input  type="text" id="fname" name="fname"/><br>
   Surname: <br><input  type="text" id="sname" name="sname"/><br>
   Email: <br><input  type="text" id="email" name="email"/><br>
   Password: <br><input  type="password" id="pass" name="pass"/><br>
   Admin: <br><input type = "checkbox" id="admin" name="admin" value = "1"/></br>
   <input  type="submit" id="submit" name="submit" value="submit"/>
</form>
</div>
</body>
</html>
