<?php
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		codejam
		</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>
<body>
<header>
	<img src="logo.jpeg" alt="Flowers in Chania" width=150px height=50px;>

</header>
<div class="container">
	<div class="top">
	<h1>CodeJam</h1>
	<h2>...5th feb, '19</h2>
	</div>
	<div class="nav">
		<ul>
			<li><a href=http://www.turington.in>Turingron</a></li>
			<li><a href=#>nothing</a></li>
			<li><a href=#>nothing</a></li>
		</ul>
	</div>


	<div class="clr"></div>

	<div class="loggedout">
	<?php
		if(!isset($_SESSION["EMAIL"]))
	{ ?>
		<form action="index.php">
		<button >Login</button>
	</form>

	<?php }else { 
		?>
	 <form action="logout.php">
		<button >Logut</button>
	</form>
	<?php 	} ?>
</div>

	
</div>
<div class="user">
		<?php
if(isset($_SESSION["EMAIL"]))
	echo $_SESSION["EMAIL"];?>
</div>

<div class ="questions">
		<ol>
			<li><a href = "double.php">Double</a> </li>
			<li><a href = "truck.php">Full truck</a></li>
			<li><a href = #>Question</a></li>
			<li><a href = #>Question</a></li>
			<li><a href = #>Question</a></li>
			
		</ol>

		<ul>
			<li>50 </li>
			<li>60</li>
			<li>70</li>
			<li>80</li>
			<li>100</li>
			
		</ul>		
	


	</div>

</div>
<?php require('rank.php');?>
	<footer>
		copyright@turington
	</footer>
</body>
</html>