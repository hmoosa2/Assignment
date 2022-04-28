<!DOCTYPE html>
<html>
<head>
<title>Edit</title>
</head>
<body>
	
<?php  
	session_start();
	if (!isset($_SESSION['login'])) // if you aren't logged in
        {
			header("Location: login.php"); // you will be sent to log in
		} ?>
<?php include 'nav.php'?>
	<div class="container">
<?php
if (isset( $_POST['submit'] )) // when the submit button is pressed
{
	include 'connect.php';

    $ID = $_GET['id']; //all the columns details are selected by their ID's in the html form far below
    $fn = $_POST['fname'];
    $sn = $_POST['sname'];
    $em = $_POST['email'];

	$updatequery ="UPDATE users SET firstname=?, lastname=?, email=? WHERE ID=?"; // SQL query to update columns within this table
    $stmt = $mysqli->prepare($updatequery); // preparing the SQL statement for less chance of SQL injection
    $stmt->bind_param('ssss', $fn, $sn, $em, $ID); // brings together all inputted information then executes the query(NOTE TO SELF: ONLY INCLUDE THE ROWS THAT WILL BE SELECTED/EDITED FOR THIS LINE AND THE TWO ABOVE)
	
	
    if (!$stmt->execute()) { // if the binded data isn't executed, an error will be brought up
        echo "Error: ".$mysqli->error;
    }
    else { //if the edit works, you will be given the option to go to the new screen
        echo "<p>Record updated successfully</p>";
        echo "<a href=\"Display.php\">Display</a>";
    } 
    $mysqli->close();
}
else
{
	include 'connect.php';
    
    $populatequery = "SELECT * from users WHERE ID=?"; //any user who has an ID within the Display table (all of them) will have their ID's selected
    $stmt = $mysqli->prepare($populatequery); 
    $stmt->bind_param('s', $_GET['id']); //and binded together
    $stmt->execute();
    $result = $stmt->get_result(); //retrived from the system

	$user = $result->fetch_assoc(); //and the data from that Users ID will be placed into the textbox which they can be placed into
    $fn = $user['firstname'];
    $sn = $user['lastname'];
    $em = $user['email'];
?>
	<h1>Edit record:</h1>
    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="post" >
        Firstname: <br><input  type="text" id="fname" name="fname" value="<?php echo "$fn"; ?>"/><br>
        Surname: <br><input  type="text" id="sname" name="sname" value="<?php echo"$sn"; ?>"/><br>
        Email: <br><input  type="text" id="email" name="email" value="<?php echo"$em"; ?>"/><br>
    <input type="submit" id="submit" name="submit" value="submit"/>
    </form>	
</div>
</body>
</html>
<?php  
}
?>
