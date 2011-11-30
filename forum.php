<?php //this is the php datebase code
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	top();
	//echo "<a href='oprettraed.php'>Opret tråd</a></br>";
	//echo "<a href='redigertraed.php'>Rediger tråd</a></br>";
	
	$resultat = mysql_query("SELECT categoryName,description,categoryID FROM categories ORDER BY categoryID DESC;") or die(mysql_error());//sorterer alle kategorier der er oprettet efter id
	while($row=mysql_fetch_array($resultat)){
		make_box($row['categoryName'],$row['description'],"enside.php?catID=".$row['categoryID']."");
		//echo '<h3><a href="redcat.php?categoryid='.$row["categoryID"].'">';
		// echo $row["categoryName"];
		// echo '</a>';
		// echo'<span style="float:right; margin-right:5px;"><a href="sletcat.php?categoryid='.$row["categoryID"].'">Slet</a></span></h3>';
		// echo'<br/>';
	}
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