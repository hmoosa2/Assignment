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
		echo "<a href = 'logout.php'>logout</a>";
	}
			
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>untitled</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.32" />
</head>

<body>
	
</body>

</html>
