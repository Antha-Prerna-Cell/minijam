<!DOCTYPE html>
<html>
<head>
  <title>resul</title>
  <link rel="stylesheet" type="text/css" href="css/compile.css">
</head>
<body>
<a href="spreadsheet.php"><input type="button" name="back" value="back" ></a> 
</body>
</html>
<?php
  session_start();
  require('connect.php');
  $user=$_SESSION["EMAIL"];
  $location = $user.'/';
  $cmd = "python3.7 ".$location.$_SESSION["myfile"]." < input/".$_SESSION["question"]." >".$location.$_SESSION["question"]."out";
  shell_exec($cmd);
    
// shell_exec("./".$location.$_SESSION["myfile"]."out < input/".$_SESSION["question"].">".$location.$_SESSION["question"]."out");


$afile = fopen($location.$_SESSION["question"]."out", "r") or die("Unable to open file!");
$bfile=fopen('outputs/'.$_SESSION["question"],"r")or die("Unable to open file!");
while(!feof($afile)|| !feof($bfile)) {
  $x=fgets($afile);
  $y=fgets($bfile);
  if($x!=$y) { ?>
    <div class="msg"><p>wrong answer</p>
  <?php exit(1);}
}
?>
<div class = "msg">
  <p>Correct Answer
  </p></div>
<?php $sql ="UPDATE table2 SET ".$_SESSION["question"]."= ".$_SESSION["marks"]." WHERE email = '".$_SESSION["EMAIL"]."'";
if(!mysqli_query($connection,$sql))
  echo " fail";
fclose($afile);
fclose($bfile);

?>
