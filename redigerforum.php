<?php 	
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	top();

 $id =$_GET["foraid"];
 $finder = mysql_query("SELECT * FROM fora WHERE foraID = ".$id.";");
 while($row = mysql_fetch_array($finder)){
 $rednavn = $row['name'];
 $redtekst = $row['description'];
}
?>
<h4>Rediger forummets navn eller beskrivelse</h4>
<form action="redforaquery.php" method="post">
	<input type="hidden" name="foraid" value="<?php echo $id?>"/>
<p>
	<span class="label">overskrift:</span>
	<input type="text" name="overskrift" size="80" value="<?php echo $rednavn;?>"/>
	<br/>
	<span class="label">beskrivelse:</span>
	<textarea cols="60" rows="10" name="beskrivelse"><?php echo $redtekst;?></textarea>
</P>
<p>
	<input type="Submit" value="knap2"/>
</P>
</form>
<?php
if(!empty($_GET['error'])){
		if($_GET['error']==1){
			echo "<span style='color: red;'>Et forum af samme navn er allerede oprettet</span>";
		}
}
?>
<p>
<?php
	// $resultat = mysql_query("SELECT name,postID FROM post WHERE foraID = ".$id." ORDER BY postID DESC;") or die(mysql_error());//sorterer alle fora der er oprettet efter id
	// while($row=mysql_fetch_array($resultat)){
		// echo '<h3><a href="redigerforum.php?foraid='.$row["foraID"].'">';
		// echo $row["name"];
		// echo '</a>';
		// echo'<span style="float:right; margin-right:5px;"><a href="sletforum.php?foraid='.$row["foraID"].'&catID='.$id.'">Slet</a></span></h3>';
		// echo'<br/>';
	// }
// ?>
</p>
<?php
	bottom();//this is the html bottom
?>