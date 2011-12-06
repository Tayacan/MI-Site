<?php //this is the php datebase code
require_once("util.php");//thus is the html top
require_once('connect.php');
require_once('auth.php');

	if(isset($_SESSION['LoggedIn'])) {
	
		top();
		if(isset($_POST["foraid"])){
			top();
			$id =$_POST["foraid"];
			$sql="UPDATE fora SET name='".$_POST["overskrift"]."', description='".$_POST["beskrivelse"]."' WHERE foraID=".$id.";";
			mysql_query($sql) or die(mysql_error());
			echo($sql);
		}
		else{
				header('Location: redcat.php');
		}
	}
	
 bottom();//this is the html bottom
?>
