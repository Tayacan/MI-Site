<?php 
	/*
	P� denne side kan man redigerer i katogoriens navn, oprette, slette og redigere fora hvis man er admin
	*/
	require_once("util.php");
	require_once('connect.php');
	require_once('auth.php');
	
	//admin tjek
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			
			// p� grund af en ukendt fejl sendes man ved dette kode tilbaget til adminmenu.php hvis catID ikke sendes med (i url) n�r man g�r her ind
			if (!isset($_GET['catID'])) {
				header('Location: adminmenu.php');
				exit;
			}
			
			top();// siden starter
			echo "<p><a href='redcat.php'>G� tilbage</a></p>";// tilbage link
			/* Her udskrives fejlmeddelelser hvis man har glemt at skrive overskrift, eller opretter en kategori med samme navn som en allederede eksisterende
			denne kode bliver f�rst aktuel n�r man sendes tilbage til den fra newcat.php*/
			if(isset($_GET['error'])) { 
				if($_GET['error'] == 1) {
					echo "<span style='color:red;'>Du har ikke skrevet en overskrift.</span><br /><br />";
				} 
				else if($_GET['error'] == 2) {
					echo "<span style='color:red;'>En kategori af samme navn er allerede oprettet.</span><br /><br />";
				}
			}
			
			// her henter den informationerne fra den valgte kategori
			$catID =$_GET["catID"];
			$finder = mysql_query("SELECT * FROM categories WHERE categoryID = ".$catID.";");
			while($row=mysql_fetch_array($finder)){
				$rednavn = $row['categoryName'];
				$redtekst = $row['description'];
			}
?>

<!-- Funktion det beder om godkendelse, f�r den sletter en besked... -->
<script type="text/javascript">
	<!--
	function confirmation(foraID, catID) {
		var answer = confirm("Vil du slette dette forum?")
		if (answer){
			window.location.href = "sletforum.php?foraid="+foraID+"&catID="+catID;
		}
	}
	//-->
</script>
<!-- som overskriften angiver bliver kan man her �ndre i overskrift eller beskrivelse i den valgte kategori-->
<h4>Rediger kategoriens navn eller beskrivelse</h4>
<form action="redcatquery.php" method="post">
	<input type="hidden" name="catID" value="<?php echo $catID; ?>"/>
	<input type="hidden" name="oldname" value="<?php echo $rednavn; ?>" /><!-- For at brugeren kan redigerer i beskrivelsen, skal vi kunne tjekke om det gamle navn �ndre sig-->
	<p>
		<span class="label">overskrift:</span>
		<input type="text" name="overskrift" size="80" value="<?php echo $rednavn;?>"/>
		<br />
		<span class="label">beskrivelse:</span>
		<textarea cols="60" rows="10" name="beskrivelse"><?php echo $redtekst;?></textarea>
	</p>
	<p>
		<input type="Submit" value="Gem �ndringer"/>
	</p>
</form>
<h2>Fora i denne kategori</h2>
<p>v�lg hvilket forum du vil redigerer</p>
<?php		//ligesom i listen over kategorier kommer der her en liste over fora, hvor man kan redigerer, slette eller oprette nyt forum, de sorteres efter id
			$resultat = mysql_query("SELECT name,foraID FROM fora WHERE categoryID = ".$catID." ORDER BY foraID DESC;") or die(mysql_error());
			while($row=mysql_fetch_array($resultat)){
				echo '<h3><a href="redigerforum.php?foraid='.$row["foraID"].'&catID='.$catID.'">';
				echo $row["name"];
				echo '</a>';
				echo'<span style="float:right; margin-right:5px; cursor:pointer;" onclick="confirmation('.$row["foraID"].', '.$catID.')">Slet</span></h3>';
				echo'<br/>';
			}	
			echo "<a href='opretforum.php?catID=".$catID."'>Opret et nyt forum<a/><br/>";// her kan et nyt forum oprettes
		}
	}
bottom();
?>
