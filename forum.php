<?php //this is the php datebase code
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	top();
?>
<h1> Admin menu </h1>
<p>
	<a href="opretcat.php">Opret kategori<a/><br/>
</p>
<?php 
	if(!empty($_GET['error'])){
		if($_GET['error']==1){
			echo "<span style='color: red;'>En katogori af samme navn er allerede oprettet</span>";
		}
	}
?>
<p>
<?php
	echo "v�lg hvilket indl�g du vil redigerer";
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