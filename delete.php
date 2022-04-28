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
