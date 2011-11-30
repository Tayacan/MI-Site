<?php //this is the php datebase code
require_once("util.php");//thus is the html top
require_once('connect.php');
require_once('auth.php');
	
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			top();

			if(isset($_POST["foraid"])){
				$id =$_POST["foraid"];
				$sql="UPDATE fora SET name='".$_POST["overskrift"]."', description='".$_POST["beskrivelse"]."' WHERE foraID=".$id.";";
				mysql_query($sql) or die(mysql_error());
				echo "<a href='redigerforum.php?foraid=".$id."'>tilbage</a>";
				echo($sql);
			}
		}
	}
bottom();//this is the html bottom
?>
