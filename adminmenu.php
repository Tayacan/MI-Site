<?php 
	/*
	Dette er admin menuen, den er til at oprette kategorier og fora, som aldmindelige bruger ikke skal kunne
	følgedne features i adminmenu er at man kan slette, oprette og redigerer kategorier.
	
	NOTE! For læsbarehedens skyld implementerer jeg ikke htmlkoder eller java scripts i resten af min kode
	*/
	require_once("util.php");
	require_once('connect.php');// conection til databasen
	require_once('auth.php');// tjekker om man er logget ind
	
	// Tjekker om man er admin i bruger tabellen, og ellers så sender man til 
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());	
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){//hvis man er admin vises siden
			top();
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

<h1> Admin menu </h1><!-- Her starter admin menuen-->
<p>
<?php	/* her bliver alle kategorier der er oprettet vist i rækkefølge efter id, Her kan man slette en kategori, eller man kan nu gå ind under en kategori 
		og redigerer navn eller beskrivelse, samt se og oprette, slette eller redigere fora */
			echo "vælg hvilket kategori du vil redigerer"; 
			$resultat = mysql_query("SELECT categoryName,categoryID FROM categories ORDER BY categoryID DESC;") or die(mysql_error());
			while($row=mysql_fetch_array($resultat)){
				echo '<h3><a href="redcat.php?catID='.$row["categoryID"].'">';
				echo $row["categoryName"];
				echo '</a>';
				echo'<span style="float:right; margin-right:5px; cursor:pointer;" onclick="confirmation('.$row["categoryID"].')">Slet</span></h3>';//slet kategori
				echo'<br/>';
			}
?>
</p>
<p>
	<a href="opretcat.php">Opret kategori<a/><br/> <!-- link til at oprette ny kategori-->
</p>
<?php
		}
		else{//hvis ikke man er admin sendes man til forummet
			echo "du har ikke adgang til denne side";
			header('Location: forum.php');
		}
	}
bottom();
?>
