<?php
	require_once('connect.php');
	require_once('util.php'); //To make sure that util.php is only required once
	require_once('auth.php');
	
	top();
	
	$findUsers = "SELECT * FROM users";
	$result = mysql_query($findUsers) or die(mysql_error());
	
	//admin tjek
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	$adminCheck = mysql_fetch_array($isadmin);
	$isAdmin = $adminCheck['isAdmin'];
		
	echo"<br />";
	echo"<table>";
	echo '<tr>
			<td><b>Brugernavn:</b></td>
			<td><b>Fornavn:</b></td>
			<td><b>Efternavn:<b/></td>
			<td><b>Email:<b/></td>
			<td><b>Admin:<b/></td>';
			if($isAdmin == 1){
				echo'<td><b>G&oslashr til admin</b></td>';
			}
	echo'</tr>';
	while($row=mysql_fetch_array($result)){
		echo '<tr>
			<td>'.$row["user"].'</td>
			<td>'.$row["firstname"].'</td>
			<td>'.$row["lastname"].'</td>
			<td>'.$row["email"].'</td>';
			if($row["isAdmin"] == 1){
				echo'<td>ja</td>';
			} else{
				echo'<td>nej</td>';
			}
			if($isAdmin == 1){
				echo'<td>[link]</td>';
			}
			
			
		echo'</tr>';
	}
	echo"</table>";
	
	
?>