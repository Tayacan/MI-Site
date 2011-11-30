<?php //this is the php datebase code
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	require_once('auth.php');
	
	top();
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
?>	
<!-- Funktion det beder om godkendelse, før den sletter en besked... -->
<script type="text/javascript">
	<!--
	function confirmation(id) {
		var answer = confirm("Vil du slette denne kategori?")
		if (answer){
			window.location.href = "sletcat.php?categoryid="+id;
		}
	}
	//-->
</script>	

<?php	
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
?>
<h1> Admin menu </h1><!-- Hele denne menu er til for at admins kan redigere og slette fora,kategorier, tråde og post-->
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
	echo "vælg hvilket kategori du vil redigerer";
	$resultat = mysql_query("SELECT categoryName,categoryID FROM categories ORDER BY categoryID DESC;") or die(mysql_error());//sorterer alle kategorier der er oprettet efter id
	while($row=mysql_fetch_array($resultat)){
		echo '<h3><a href="redcat.php?categoryid='.$row["categoryID"].'">';
		echo $row["categoryName"];
		echo '</a>';
		echo'<span style="float:right; margin-right:5px;" onclick="confirmation('.$row["categoryID"].')">Slet</span></h3>';
		echo'<br/>';
	}
?>
</p>
<?php
		}
		else{
			header('Location: forum.php');
		}
	}
?>

<?php bottom();//this is the html bottom
?>
