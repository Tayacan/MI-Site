<?php
	require_once('connect.php');
	require_once('util.php'); //To make sure that util.php is only required once
	//require_once('auth.php');
	
	top();
	
	//admin tjek
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	$adminCheck = mysql_fetch_array($isadmin);
	$isAdmin = $adminCheck['isAdmin'];
	
	$findUsers = "SELECT * FROM users ORDER BY user";
	$result = mysql_query($findUsers) or die(mysql_error());
	
	if ($isAdmin == 1 && isset($_POST['userId'])){
		//echo"userID er ".$_POST['userId'];
		$sql="UPDATE users SET isAdmin='1' WHERE userID=".mysql_real_escape_string($_POST['userId']).";";
		mysql_query($sql) or die(mysql_error());
		header('Location: users.php');
	}
	
	echo"<br />";
	echo"<table>";
	echo '<tr>
			<td><b>Brugernavn:</b></td>
			<td><b>Fornavn:</b></td>
			<td><b>Efternavn:<b/></td>
			<td><b>Email:<b/></td>
			<td><b>Admin:<b/></td>';
			if($isAdmin == 1){
				echo'<td><b>Gør til admin</b></td>';
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
				?>
				<td>
				<?php
				if($row['isAdmin'] != 1) {
				?>
					<form action="users.php" method="post">
						<input type="hidden" name="userId" 
							value="<?php echo $row['userID']; ?>"/>
						<input type="submit" value="Gør til admin"/>
					</form>
				<? } ?>
				</td>
				<?php
			}
			
			
		echo'</tr>';
	}
	echo"</table>";
	
	
?>
