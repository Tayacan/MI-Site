<?php 
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	require_once('auth.php');
	
	// admintjek
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			top();
			//her slettes kategorien og alt hvad der h�rer under den
			$id =$_GET["categoryid"];
			$sql = "DELETE FROM categories WHERE categoryID = ".$id.";";
			mysql_query($sql) or die(mysql_error());
			echo $sql;
			echo "<a href='adminmenu.php'>tilbage</a>";
		}
	}
bottom();//this is the html bottom
?>
