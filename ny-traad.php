<?php //this is the php datebase code
require_once("util.php");//thus is the html top
require_once('connect.php');
require_once('auth.php');
	
		if(isset($_SESSION['LoggedIn'])) {
			top();
 
			$id =$_POST["foraID"];

			$overskrift=mysql_real_escape_string($_POST["overskrift"]);// taget h�jde for sql injektions 
			$beskrivelse=mysql_real_escape_string($_POST["written_text"]);// -||-			

			$checkthread = 'SELECT name FROM threads WHERE name = "'.$overskrift.'";';//tjekker om kategorien er blevet oprette f�r
			$checkname = mysql_query($checkthread) or die(mysql_error());
			if(mysql_num_rows($checkname) >0){
				header('Location: ny-traad.php?error=1');
				exit;
			}
			$sql="INSERT INTO threads (name, description, foraID, userID)
				VALUES ('".$overskrift."','".$beskrivelse."','".$id."','".$_SESSION['LoggedIn']."');";
				echo($sql);
				mysql_query($sql) or die(mysql_error());
				//echo "<a href='redcat.php?categoryid=".$id."'>tilbage</a>";


		
	}
bottom();//this is the html bottom
?>
