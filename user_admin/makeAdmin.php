<?php
	require_once('../connect.php');
	require_once('../util.php'); //To make sure that util.php is only required once
	top("","../");
	
	$findUsers = "SELECT * FROM users";
	$result = mysql_query($findUsers) or die(mysql_error());
	
	echo"<table>";
	while($row=mysql_fetch_array($result)){
		echo '<tr><td><b>Brugernavn:</b> '.$row["user"].'</td><td>Fornavn: '.$row["firstname"].'</td><td>Efternavn: '.$row["lastname"].'</td><td>Email: '.$row["email"].'</td><td>Admin: '.$row["isAdmin"].'</td></tr><br/>';
	}
	echo"</table>";
?>