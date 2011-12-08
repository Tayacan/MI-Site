<?php //this is the php datebase code
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	top();
	
	$id =$_GET['catID'];
	$query = "SELECT name,description,foraID FROM fora WHERE categoryID=".$id." ORDER BY foraID DESC;";
	//echo $query;
	$resultat = mysql_query($query) or die(mysql_error());//sorterer alle fora der er oprettet efter id
			while($row=mysql_fetch_array($resultat)){
			fora_menu($row['name'],$row['description'],"vistraade.php?foraID=".$row['foraID']."");
				}
	echo "<a href='forum.php?categoryid=".$id."'>tilbage</a>";	
	bottom();//this is the html bottom
?>