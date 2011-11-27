<?php //this is the php datebase code
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	require_once('auth.php');
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			top();
			//Her bliver en ny kategori oprettet i databasen, hvis ikke den er oprettet før
			$overskrift=$_POST["overskrift"];
			$beskrivelse=$_POST["beskrivelse"];

			$chekcat = 'SELECT categoryName FROM categories WHERE categoryName = "'.$overskrift.'";';//tjekker om kategorien er blevet oprette før
			$checkname = mysql_query($chekcat) or die(mysql_error());
			if(mysql_num_rows($checkname) >0){
				header('Location: rediger.php?error=1');
			}
			$sql="INSERT INTO categories(categoryName,description)
				VALUES('".$overskrift."','".$beskrivelse."');";
			mysql_query($sql);
			echo($sql);

			echo "<a href='adminmenu.php'>tilbage</a>";
		}
	}

bottom();//this is the html bottom
?>
