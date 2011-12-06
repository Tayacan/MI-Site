<?php //this is the php datebase code
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	top();
	//echo "<a href='oprettraed.php'>Opret tråd</a></br>";
	//echo "<a href='redigertraed.php'>Rediger tråd</a></br>";
	
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			echo "<a href='adminmenu.php'>gå til adminmenu</a><br />";
		}
	}
	$resultat = mysql_query("SELECT categoryName,description,categoryID FROM categories ORDER BY categoryID DESC;") or die(mysql_error());//sorterer alle kategorier der er oprettet efter id
	while($row=mysql_fetch_array($resultat)){
		make_box($row['categoryName'],$row['description'],"visfora.php?catID=".$row['categoryID']."");
	}

?>

<?php bottom();//this is the html bottom
?>
