<?php //this is the php datebase code
require_once("util.php");//thus is the html top
require_once('connect.php');
require_once('auth.php');
	
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			top();
 
			$id =$_POST["catID"];
			$overskrift=$_POST["overskrift"];
			$description=$_POST["description"];

			$chekfora = 'SELECT name FROM fora WHERE name = "'.$overskrift.'";';//tjekker om kategorien er blevet oprette før
			$checkname = mysql_query($chekfora) or die(mysql_error());
			if(mysql_num_rows($checkname) >0){
				header('Location: redigerfora.php?error=1');
				exit;
			}
			$sql="INSERT INTO fora (name, description, categoryID)
				VALUES ('".$overskrift."','".$description."','".$id."');";
				echo($sql);
				mysql_query($sql);
				echo "<a href='redcat.php?categoryid=".$id."'>tilbage</a>";

// echo "<a href='forum.php'>tilbage</a>"; 
// $name=$_POST["name"];
// $description=$_POST["description"];
// $catID=$_POST['catID'];
// //her skal der være noget med CategoryID
		}
	}
bottom();//this is the html bottom
?>
