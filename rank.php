<?php
require('connect.php');
	if(!isset($_SESSION)) 
    { 
        session_start(); 
	}
$cmd="SELECT * FROM table2";
$result= mysqli_query($connection,$cmd);

while($row=mysqli_fetch_array($result))
	$rank[$row['email']]=$row['q1']+$row['q2']+$row['q3']+$row['q4'];
arsort($rank);
	?>
<table>
	<tr>
		<th>email-id</th>
		<th>score</th>
	</tr>
<?php
foreach($rank as $r=>$rval)
{ ?> <tr><td><?php	echo $r; ?></td>
	<td><?php	echo $rval; ?></td></tr>
<?php }?>