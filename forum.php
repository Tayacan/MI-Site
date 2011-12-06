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
			echo "<a href='adminmenu.php' style='text-decoration: none;'><span style='float:left; margin-left: 4.5px; margin-right 5px; background-color: #8080FF; width:627px;color: #FFFFFF;
			margin-top: 4.5px; margin-bottom: 0px;'><h3>Gå til adminmenu</h3></span></a><br />"; // den skal kun bruges et sted og der er derfor ikke kodet css
		}
	}
	$resultat = mysql_query("SELECT categoryName,description,categoryID FROM categories ORDER BY categoryID DESC;") or die(mysql_error());//sorterer alle kategorier der er oprettet efter id
	while($row=mysql_fetch_array($resultat)){
		make_box($row['categoryName'],$row['description'],"visfora.php?catID=".$row['categoryID']."");
	}

?>

<?php bottom();//this is the html bottom
?>
