<?php //this is the php datebase code
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	top();
	
	//følgende kode tjekker om man er admin. Hvis man er vises link til adminmenuen
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			echo "<a href='adminmenu.php'>gå til adminmenu</a>";
		}
	}
	//
	
	
	
?>

<?php bottom();//this is the html bottom
?>