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
				// echo '<h3><a href="redigerforum.php?foraid='.$row["foraID"].'">';
				// echo $row["name"];
				// echo '</a>';
				// echo'<span style="float:right; margin-right:5px;"><a href="sletforum.php?foraid='.$row["foraID"].'&catID='.$id.'">Slet</a></span></h3>';
				// echo'<br/>';
			}
			
	echo "<a href='visfora.php?foraID=".$id."'>tilbage</a>";
	
	bottom();//this is the html bottom
