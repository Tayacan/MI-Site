<?php
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	top();
	
	$id = $_GET['foraID'];
	$cat = $_GET['catID'];

	$getThreadsQuery = "SELECT * FROM threads WHERE foraID=".$id;
	$result = mysql_query($getThreadsQuery) or die(mysql_error());

	while($row = mysql_fetch_array($result)) {
		echo "<h3><a href='viewThread.php?threadID=".$row['threadID']."&catID=".$cat."'>".$row['name']."</a></h3><br />";
	}

	echo "<a href='visfora.php?catID=".$cat."'>Tilbage</a></br>";
	echo "<a href='oprettraad.php?foraID=".$id."'>Opret en tråd</a>";
	
	bottom();//this is the html bottom
