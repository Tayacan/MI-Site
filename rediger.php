<?php //this is the php datebase code
	require_once('connect.php');
	require_once('util.php');
	require_once('auth.php');
	
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			top();
			if(!empty($_GET['error'])){
				if($_GET['error']==1){
					echo "<span style='color: red;'>En katogori af samme navn er allerede oprettet</span>";
					echo "<a href='forum.php'>tilbage</a>";
				}
			}
		}
	}
 bottom();//this is the html bottom
?>
