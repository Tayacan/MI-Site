<?php
	require_once("util.php");
	require_once('connect.php');
	require_once('auth.php');
	
	// denne side tjekker først om man er admin og ellers sendes man tilbage til forumsiden
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			top();
			
			/* Her udskrives fejl hvis man har glemt at skrive overskrift, eller opretter en kategori med samme navn som en allederede eksisterende
			denne kode bliver først aktuel når man sendes tilbage til den fra newcat.php*/
			if(isset($_GET['error'])) { 
				if($_GET['error'] == 1) {
					echo "<span style='color:red;'>Du har ikke skrevet en overskrift.</span><br /><br />";
				} 
				else if($_GET['error'] == 2) {
					echo "<span style='color:red;'>En kategori af samme navn er allerede oprettet.</span><br /><br />";
				}
			}
			echo "<a href='adminmenu.php'>tilbage</a>";// tilbage link hvis man fortryder
?>
<!-- Her skrives overskrift og beskrivelse af kategorien, når man submitter sendes variablerne viderer til newcat.php som indsætter i kategori tabellen-->

<h1>Opret kategori</h1>
<form action="newcat.php" method="post">
<p>
		<span class="label">overskrift:</span>
		<input type="text" name="overskrift" size="80"/>
		<br/>
		<span class="label">beskrivelse:</span>
		<textarea cols="100" rows="10" name="beskrivelse"></textarea>
</P>
<p>
<input type="Submit" value="opret kategori"/>
</P>
</form>
<?php 
		}
	}
bottom();
?>