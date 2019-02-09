<?php
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(isset($_POST['email'])){
	$email=$_POST['email'];
	$checkexist = mysqli_query($connection,"SELECT email FROM table2 WHERE email='".$email."'");
	if(mysqli_num_rows($checkexist)==0)
	{$query = "INSERT INTO `table2` (email) VALUES('$email')";
	 mysqli_query($connection,$query);
	}
$_SESSION['EMAIL']=$_POST['email'];
header("Location:spreadsheet.php");
}
?>