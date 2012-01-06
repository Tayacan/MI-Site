<?php //this is the php datebase code
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	top();
	
	$id =$_GET['foraID'];
	$query = "SELECT name,description,foraID FROM fora WHERE foraID=".$id." ORDER BY foraID DESC;";
	//echo $query;
	$resultat = mysql_query($query) or die(mysql_error());//sorterer alle fora der er oprettet efter id
			while($row=mysql_fetch_array($resultat)){
			fora_menu($row['name'],$row['description'],"epicfejling.php?foraID=".$row['foraID']."");
				}
			
	echo "<a href='visfora.php?categoryid=".$id."'>tilbage</a></br>"; // virker ikke
		echo "<a href='oprettraad.php?foraID=".$id."'>opret en tråd</a>"; 
	
	bottom();//this is the html bottom
