
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
        	$_SESSION["question"]="q1";
        	$_SESSION["marks"]=50;
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
		<h1>Double Strings</h1>
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
			The <b>palindrome</b> is a string that can be read the same way from left to right and from right to left. For example, strings <b>"aaaaa"</b>, <b>"1221"</b>, <b>"bbaabb"</b> are palindromes, however the string <b>"chef"</b> is <b>not a palindrome</b> because if we read it from right to left, we will obtain <b>"fehc"</b> that is not the same as <b>"chef"</b>.<br><br>

			We call a string a <b>"double string"</b> if it has an even length and the first half of this string is equal to the second half of this string, for example <b>"abab" is a double string</b> because the first half "ab" is equal to the second half "ab", however the string <b>"abba" is not a double string </b>because the first half "ab" is not equal to the second half "ba". The empty string "" is a double string, and its length is 0.<br><br>

			Chef doesn't like <b>palindromes</b>, however he likes <b>"double strings"</b>. He often likes to change the order of letters in some palindrome and sometimes to remove some symbols from it. Now he wonders: if a palindrome of length N is given, <b>what is the maximal possible number of characters in a double string" that can be obtained by removing and changing the order of symbols in it?</b> </p>


         <hr>
         <h3>INPUT</h3>
         <p>
         	Several test cases are given.<br>
			<br>The first line of the sample input contains an integer T - the number of test cases.
			<br>Then, T lines follow.
			<br>Each line consists of a single integer N - the length of a palindrome.</p>

			<hr>
			<h3>OUTPUT</h3>
			<p>For each test case output a single integer - answer to the problem. 
			</p><hr>


			<h3>Constraints</h3>
			<ul><li>1<=T<=10000</li>
				<li>1<=N<=1000000000</li>
			</ul>
			<hr>
			<div class="examples">
			<h3>Examples</h3>
			<h5>Input:</h5>
			2<br>2<br>4
			<h5>Output:</h5>
			2<br>4
			
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