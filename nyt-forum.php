<?php //this is the php datebase code
 require_once("util.php");//thus is the html top
 require_once('connect.php');
 top();
?>
<div class='opretforum'>
</div>
<?php
$name=$_REQUEST["name"];
$description=$_REQUEST["description"];
//her skal der være noget med CategoryID

$sql="INSERT INTO fora (name, description)
	VALUES ('".$name."','".$description."');";
echo($sql);
mysql_query($sql);

header("Location:index.php");
?>
<?php bottom();//this is the html bottom
?>