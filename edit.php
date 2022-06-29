<!DOCTYPE html>
<html>
<head>
<title>Edit</title>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel = "stylesheet" href = "Assignment.css">
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
		<div class="row justify-content-center">
		<div class ="container">
	<h1>Edit record:</h1>
    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="post" >
        
        <div class="form-group">
        <input type="text" name="fname" class = "form-control" id="fname" value="<?php echo "$fn"; ?>"/>
        </div>
        
        <div class="form-group">
        <input type="text" name="sname" class = "form-control" id="sname" value="<?php echo "$sn"; ?>"/>
        </div>
        
        <div class="form-group">
        <input type="text" name="email" class = "form-control" id="email" value="<?php echo "$em"; ?>"/>
        </div>
    <input type="submit" id="submit" name="submit" value="submit"/>
    <div class="form-group">
		<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
		</div>
    </form>	
</div>
</body>
</html>
<?php  
}
?>
