<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
}

?>
<?php
require('connect.php');
require('login.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
	<img src="logo.jpeg" alt="Turington" width=150px height=50px;>

</header>
<div class="container">
	<div class="top">
	<h1>CodeJam</h1>
	<h2>...5th feb, '19</h2>
	</div>
</div>

<form method="POST" >
	<label>Email-id :</label><br>
	<input type="Email-id" name="email" required>
	<br>
	<button type="submit">login
	</button>
</form>
<footer>
		copyright@turington
	</footer>
</body>
</html>