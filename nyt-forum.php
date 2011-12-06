<?php //this is the php datebase code
require_once("util.php");//thus is the html top
require_once('connect.php');
require_once('auth.php');
	//admintjek
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			$id =$_POST["catID"];
			if(!$_POST['overskrift']) {
				header("Location: redcat.php?error=1&catID=$id");
				exit;
			}
			top();
			// her lægges admins overskrift og description ind i 
			$overskrift=mysql_real_escape_string($_POST["overskrift"]);// her er der taget højde for beskyttelse mod sql injektion
			$description=mysql_real_escape_string($_POST["description"]);// -||-
			
			// Her tjekkes om et forum med samme navn allerede er oprettet
			$chekfora = 'SELECT name FROM fora WHERE name = "'.$overskrift.'";';
			$checkname = mysql_query($chekfora) or die(mysql_error());
			if(mysql_num_rows($checkname) >0){
				header("Location: opretforum.php?error=2&catID=$id");
				exit;
			}
			// hvis der ingen fejlmeddelelser er, så indsættes data i tabellen
			$sql="INSERT INTO fora (name, description, categoryID)
				VALUES ('".$overskrift."','".$description."','".$id."');";
				echo($sql);
				mysql_query($sql);
				echo "<a href='redcat.php?catID=".$id."'>tilbage</a>";
		}
	}
bottom();//this is the html bottom
?>
