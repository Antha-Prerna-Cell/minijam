
<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
}
if (isset($_FILES["file"]["name"]))
	if(isset($_SESSION["EMAIL"])) {

    $name = $_FILES["file"]["name"];
    $tmp_name = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];

    $user=$_SESSION["EMAIL"];
    if(!file_exists($user))
    mkdir($user);
    $fileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));

    if($fileType != "py" && $fileType != "java" && $fileType != "cpp" ) 
    	{ ?>
    <div class="alert">
    	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
     Sorry, only cpp, java, Python files are allowed.
 </div>
	<?php }
else
    if (!empty($name)) {
        $location = $user.'/';

        if  (move_uploaded_file($tmp_name,$location.$name)){
        	$_SESSION["myfile"]=$name;
        	$_SESSION["question"]="q2";
        	$_SESSION["marks"]=60;
           if($_POST["language"]=="c++")
           header("Location:c++.php");
       		else
       			if($_POST["language"]=="python")
           header("Location:python.php");
       		else
       		if($_POST["language"]=="java")
           header("Location:java.php");
       		else
       			if($_POST["language"]=="php")
           header("Location:php.php");
        }

    } else {
        echo 'please choose a file';
    }
}else
{ ?>
    <div class="alert">
    	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
     you need to login first!
 </div>
	<?php }

?>
<!DOCTYPE html>
<html>
<head>
	<title>codingturtles</title>
	<link rel="stylesheet" type="text/css" href="css/quedtions.css">
	
</head>
<body>
<header>
	<img src="logo.jpeg" alt="Turington" width=150px height=50px >
</header>
<div class="contain">
		<div class="headin">
		<h1>Full Truck</h1>
		 </div>
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

		<hr>
		 <p>
			Robert is moving soon, and he wants to choose a truck that can hold a certain amount of weight. He knows the weights of all the items he is putting on the truck. Can you help him determine the maximum number of items that he can put on a truck of any given weight?
			<br><br>
			You are given an array <b>a </b>of <b>n </b>integers, the weights of the items.Then, you are given a integer <b>w</b>, which is a weight of a truck. You must print the number of items that can fit on the truck, each item with weight<b> a[i]</b>.

 </p>


         <hr>
         <h3>INPUT</h3>
         <ul>
         	<li> First line of sample input contains a single integer T - denotes number of testcases</li>
         	<li> first line of each test case contain two characters <b> n</b> and <b> w</b></li>
         	<li> next line contains n space seprated integers, the weight of each item</li>
         </ul><hr>
         <h3>OUTPUT</h3>
			<p>For each test case output a single integer - answer to the problem. 
			</p>


         <hr>


			<h3>Constraints</h3>
			<ul><li>1<=T<=100</li>
				<li>1<=N<=1000000</li>
				<li>1<=a[i]<=1000000000</li>
			</ul>
			<hr>
			<div class="examples">
			<h3>Examples</h3>
			<h5>Input:</h5>
			2<br> 10 3<br> 2 4 6 1 2 7 1 8 1 9 <br> <br>10 8 <br>2 4 6 1 2 7 1 8 1 9<br>
			<h5>Output:</h5>
			3 (Items: 1+1+1=3 are selected)<br>5 (Items: 1+1+1+2+2=7 are selected)
			<hr>
		</div>

</div>


 <div class="for">
	<form method="POST" enctype="multipart/form-data">
		<label >choose your language - </label>
 	<select name="language" size="1" value="language" required> Language
 	<option value ="c++">C++</option>			
 	<option value ="java">Java</option>
 	<option value ="python">Python 3.7</option>
 	<option value ="php">PHP</option>
 </select><br><br>
 	<input type="file" name="file">
			<br><br>
			<button type="submit" name="submit"> submit</button="submit">
	</form>
</div>

</body>
</html>