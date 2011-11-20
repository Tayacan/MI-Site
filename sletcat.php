<?php 
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	top();
?>
<?php
$id =$_GET["categoryid"];
$sql = "DELETE FROM categories WHERE categoryID = ".$id.";";

mysql_query($sql) or die(mysql_error());
echo $sql;
//header("Location:menu.php");
?>
<?php bottom();//this is the html bottom
?>