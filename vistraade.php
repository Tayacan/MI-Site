<?php //this is the php datebase code
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	top();
	
	$id = $_GET['foraID'];
	$cat = $_GET['catID'];

	$getThreadsQuery = "SELECT * FROM threads WHERE foraID=".$id;
	$result = mysql_query($getThreadsQuery) or die(mysql_error());

	while($row = mysql_fetch_array($result)) {
		echo $row['name']."<br />";
	}

	echo "<a href='visfora.php?catID=".$cat."'>tilbage</a></br>";
	echo "<a href='oprettraad.php?foraID=".$id."'>opret en tråd</a>"; 
	
	bottom();//this is the html bottom
