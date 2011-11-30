<?php //this is the php datebase code
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	require_once('auth.php');
	
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			top();
			$id =$_GET["categoryid"];
			$finder = mysql_query("SELECT * FROM categories WHERE categoryID = ".$id.";");
			while($row=mysql_fetch_array($finder)){
			$rednavn = $row['categoryName'];
			$redtekst = $row['description'];
			}
?>
<h4>Rediger kategoriens navn eller beskrivelse</h4>
<form action="redcatquery.php" method="post">
	<input type="hidden" name="categoryid" value="<?php echo $id?>"/>
<p>
	<span class="label">overskrift:</span>
	<input type="text" name="overskrift" size="80" value="<?php echo $rednavn;?>"/>
	<br/>
	<span class="label">beskrivelse:</span>
	<textarea cols="60" rows="10" name="beskrivelse"><?php echo $redtekst;?></textarea>
</P>
<p>
	<input type="Submit" value="Rediger"/>
</P>
</form>
<h2>Fora i denne kategori</h2>
<?php
			if(!empty($_GET['error'])){
				if($_GET['error']==1){
					echo "<span style='color: red;'>Et forum af samme navn er allerede oprettet</span>";
				}
			}	
?>
<p>vælg hvilket forum du vil redigerer</p>
<p>
<?php
		$resultat = mysql_query("SELECT name,foraID FROM fora WHERE categoryID = ".$id." ORDER BY foraID DESC;") or die(mysql_error());//sorterer alle fora der er oprettet efter id
			while($row=mysql_fetch_array($resultat)){
				echo '<h3><a href="redigerforum.php?foraid='.$row["foraID"].'">';
				echo $row["name"];
				echo '</a>';
				echo'<span style="float:right; margin-right:5px;"><a href="sletforum.php?foraid='.$row["foraID"].'&catID='.$id.'">Slet</a></span></h3>';
				echo'<br/>';
			}	
?>
</p>
<a href="opretforum.php?categoryid=<?php echo $id ?>">Opret et nyt forum<a/><br/>
<?php 
		}
	}
bottom();//this is the html bottom
?>