<?php
require_once("util.php");
require_once('connect.php');
require_once('auth.php');
	//admintjek
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			top();
			// sletter alt under det valgte fora
			$catID = $_GET['catID'];
			$id =$_GET["foraid"];
			$sql = "DELETE FROM fora WHERE foraID = ".$id.";";
			mysql_query($sql) or die(mysql_error());
			echo($sql);
			echo "<a href='redcat.php?catID=".$catID."''>tilbage</a>";
		}
	}
bottom();//this is the html bottom
?>