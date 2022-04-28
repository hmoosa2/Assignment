<?php
session_start(); // this page will log you out in a split second (first it will hold any session from another page)
$_SESSION = array(); //then make an array of your session

if(ini_get("session.use.cookies")){ //it will then take your data within the session if it exists

$params = session_get_cookie_params(); //turn it into a variable
setcookie(session_name(),'', time() - 42000, //dismantle and timeout this session 
$params["path"], $params["domain"], $params["secure"], $params["httponly"] //grab whats left of the session on the web
);
}

session_destroy(); // and destroy it

header("Location: login.php"); // and you will be sent to log in
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
