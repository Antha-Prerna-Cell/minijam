<!DOCTYPE html>
<html>
<head>
  <title>result</title>
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
  $cmd = "g++ -o ".$location.$_SESSION["myfile"]."out"." ".$location.$_SESSION["myfile"]." 2>&1";
  if(shell_exec($cmd)){ ?>
    <div class="msg">
      <p>compilation error</p>
      <div class="compile">
      <?php echo shell_exec($cmd); exit(1);?>
    </div>
    </div>
  <?php }
 shell_exec("./".$location.$_SESSION["myfile"]."out < input/".$_SESSION["question"].">".$location.$_SESSION["question"]."out");


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

