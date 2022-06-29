<!DOCTYPE html>

<?php
session_start();
 if (!isset($_SESSION['login'])) // if you aren't logged in
        {
			header("Location: login.php"); // you will be sent to log in
		}
?>
<html>
<head>
<title>Delete</title>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel = "stylesheet" href = "Assignment.css">
</head>
<body>
<?php include 'nav.php'?>
<p>Are you sure?</p>
<a href="delete.php?id=<?php echo $_GET['id']?>&sure=TRUE">Yes</a>
<a href="Display.php">No - Go back</a>
<?php
if(isset($_GET['sure'])){
	if($_GET['sure'] == TRUE){
		include 'connect.php';

		$deletequery = "DELETE FROM users WHERE ID=?";
		$stmt = $mysqli->prepare($deletequery);
		$stmt->bind_param('s', $_GET['id']);
		$stmt->execute();

		header("location: Display.php");
	}
}
?>
</body>
</html>
