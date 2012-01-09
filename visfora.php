<?php //this is the php datebase code
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	top();

	$id =$_GET['catID'];
	$getCat = mysql_fetch_array(mysql_query("SELECT categoryName FROM categories WHERE categoryID=".$id.";"));
	echo "<a href='forum.php' style='text-decoration: none;'>
                                <span style='float:left; margin-left: 4.5px; margin-right 5px; background-color: #8080FF; 
                                width:627px;color: #FFFFFF; margin-top: 4.5px; margin-bottom: 0px;'>
                                        <h3><i>".$getCat['categoryName']."</i></h3>
                                </span>
                                </a><br />";
	
	$query = "SELECT name,description,foraID FROM fora WHERE categoryID=".$id." ORDER BY foraID DESC;";
	//echo $query;
	$resultat = mysql_query($query) or die(mysql_error());//sorterer alle fora der er oprettet efter id
			while($row=mysql_fetch_array($resultat)){
			fora_menu($row['name'],$row['description'],"vistraade.php?foraID=".$row['foraID']."&catID=".$id);
				}
	echo "<a href='forum.php?categoryid=".$id."'>tilbage</a>";	
	bottom();//this is the html bottom
?>
