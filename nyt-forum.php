<?php //this is the php datebase code
 require_once("util.php");//thus is the html top
 require_once('connect.php');
 top();
 
$id =$_POST["catID"];//PROBLEM HER
$overskrift=$_POST["overskrift"];
$description=$_POST["description"];

$chekfora = 'SELECT name FROM fora WHERE name = "'.$overskrift.'";';//tjekker om kategorien er blevet oprette f�r
$checkname = mysql_query($chekfora) or die(mysql_error());
if(mysql_num_rows($checkname) >0){
	header('Location: redigerfora.php?error=1');
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
// //her skal der v�re noget med CategoryID



bottom();//this is the html bottom
?>