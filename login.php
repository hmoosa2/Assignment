<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	</head>
<body>
	<div class="container">
		<h1>Login</h1>
<form method="POST" action="login.php">
Email:<br><input type="text" name="email" id="email"/>
<br>
Password:<br><input type="password" name="password" id="password"/>
<br>
<input type="submit" name="submit" value="Login"/>
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
</body>
</html>
