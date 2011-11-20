<?php //this is the php datebase code
	require_once('connect.php');
	require_once('util.php');
	top();
	if(!empty($_GET['error'])){
		if($_GET['error']==1){
			echo "<span style='color: red;'>Katogorien er allerede oprettet</span>";
		}
	}
?>
<h1>rediger</h1>
<p>vælg hvilket indlæg du vil redigerer</p>
<p>
<?php
	$resultat = mysql_query("SELECT categoryName,categoryID FROM categories ORDER BY categoryID DESC;") or die(mysql_error());//sorterer alle kategorier der er oprettet efter id
	while($row=mysql_fetch_array($resultat)){
		echo '<h3><a href="redcat.php?categoryid='.$row["categoryID"].'">';
		echo $row["categoryName"];
		echo '</a>';
		echo'<span style="float:right; margin-right:5px;"><a href="sletcat.php?categoryid='.$row["categoryID"].'">Slet</a></span></h3>';
		echo'<br/>';
	}
?>
</p>
<?php bottom();//this is the html bottom
?>