<?php 
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	top();


$id =$_GET["categoryid"];
$sql = "DELETE FROM categories WHERE categoryID = ".$id.";";

mysql_query($sql) or die(mysql_error());
echo $sql;
echo "<a href='forum.php'>tilbage</a>";

bottom();//this is the html bottom
?>