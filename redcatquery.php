<?php //this is the php datebase code
	require_once("util.php");//thus is the html top
	require_once('connect.php');

if(isset($_POST["categoryid"])){
	top();
	$id =$_POST["categoryid"];
	$sql="UPDATE categories SET categoryName='".$_POST["overskrift"]."', description='".$_POST["beskrivelse"]."' WHERE categoryID=".$id.";";
	mysql_query($sql) or die(mysql_error());
	echo($sql);
}
else{
	header('Location: redcat.php');
}
echo "<a href='forum.php'>tilbage</a>";
bottom();//this is the html bottom
?>