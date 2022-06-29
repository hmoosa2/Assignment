<?php
include 'nav.php';
 session_start();
 if (!isset($_SESSION['login'])) // if you aren't logged in
        {
			header("Location: login.php"); // you will be sent to log in
		}

	else if($_SESSION['admin'] == 0) //if you aren't supposed to be here, you will be kindly asked to leave
	{
		echo "<p> lost? </p>";
		echo "<a href = 'login.php'>Login</a>";
		echo "<a href = 'Display.php'>Return</a>";
	} 
	else // if you are supposed to be here you will be welcomed with a badge of your status
	{
		echo "<h1> Welcome ".$_SESSION['user']. "</h1>";
		echo "<h1> Admin area </h1>";
		//echo "<a href = 'logout.php'>logout</a>";
	}
			
		
?>
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
	
</body>

</html>
