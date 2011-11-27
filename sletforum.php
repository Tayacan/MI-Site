<?php
require_once("util.php");//thus is the html top
require_once('connect.php');
require_once('auth.php');
	
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			top();
			$catID = $_GET['catID'];
			$id =$_GET["foraid"];
			$sql = "DELETE FROM fora WHERE foraID = ".$id.";";
			mysql_query($sql) or die(mysql_error());
			echo($sql);
			echo "<a href='redcat.php?categoryid=".$catID."''>tilbage</a>";
		}
	}
bottom();//this is the html bottom
?>