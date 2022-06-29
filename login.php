<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<link rel = "stylesheet" href = "Assignment.css">	
	</head>
<body>
	<div class="row justify-content-center">
		<div class ="container">
		<h1>Login</h1> 
		<form method="POST" action="login.php">
		<div class="form-group">
		<label> Email</label>
		<input type="text" name="email" class = "form-control" id="email" value="enter your name"/>
		</div>
		<div class="form-group">
		<label>Password</label>
		<br>
		<input type="password" name="password" class = "form-control" id="password" value="enter your password"/>
		</div>
		<div class="form-group">
		<button type="submit" class="btn btn-primary" name="submit" value="Login">Login</button>
		</div>
		</form>
<?php 
include 'connect.php';
if (isset($_POST['submit'])){

$email = $_POST['email'];
$password = $_POST['password'];	

$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param('s', $email);

$stmt->execute();

$user = $stmt->get_result()->fetch_assoc();

if (!empty($user['email'])) { 
    if (password_verify($password, $user['password'])) {
        echo "<p>Login Sucessful</p>";
        session_start();
        
        $_SESSION['login'] = TRUE;
        $_SESSION['user'] = $user['email'];
        $_SESSION['admin'] = $user['Admin'];
        
        if ($user['Admin'] == 1)
        {
			echo "<a href=\"admin.php\">Admin area</a>"; // admin area users will be given access to pages they're allowed access to
		}
		else
		{
			echo "<a href=\"Display.php\">Display area</a>"; //non admin users will be logged into a normal access level page
		}
        
         
    } else {
		echo "<p>Login Failed 3</p>"; //the user exists but password is wrong
    }
} else {
    echo "<p>Login Failed 2</p>"; //the user doesnt exist
}

$stmt->close();
$mysqli->close();
	}
?>
</div>
</div>
</body>
</html>
