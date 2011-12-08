<?php 	
require_once("util.php");
require_once('connect.php');
require_once('auth.php');
	//admintjek
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			top();
			$id =$_GET['foraid'];
			$catID =$_GET['catID'];
			$finder = mysql_query("SELECT * FROM fora WHERE foraID = ".$id.";");
			 while($row = mysql_fetch_array($finder)){
				$rednavn = $row['name'];
				$redtekst = $row['description'];
			}
				/* Her udskrives fejl hvis man har glemt at skrive overskrift, eller opretter et forum med samme navn som en allederede eksisterende
			denne kode bliver først aktuel når man sendes tilbage til den fra newcat.php*/
			if(isset($_GET['error'])) { 
				if($_GET['error'] == 1) {
					echo "<span style='color:red;'>Du har ikke skrevet en overskrift.</span><br /><br />";
				} 
				else if($_GET['error'] == 2) {
					echo "<span style='color:red;'>Et forum af samme navn er allerede oprettet.</span><br /><br />";
				}
			}
			echo "<a href='redcat.php?foraid=".$id."&catID=".$catID."'>tilbage</a>";// tilbage link hvis man fortryder
?>
<h4>Rediger forummets navn eller beskrivelse</h4>
<form action="redforaquery.php" method="post">
	<input type="hidden" name="foraid" value="<?php echo $id?>"/>
	<input type="hidden" name="catID" value="<?php echo $catID?>"/>
	<input type="hidden" name="oldname" value="<?php echo $rednavn; ?>" /><!-- For at brugeren kan redigerer i beskrivelsen, skal vi kunne tjekke om det gamle navn ændre sig-->
<p>
	<span class="label">overskrift:</span>
	<input type="text" name="overskrift" size="80" value="<?php echo $rednavn;?>"/>
	<br/>
	<span class="label">beskrivelse:</span>
	<textarea cols="60" rows="10" name="beskrivelse"><?php echo $redtekst;?></textarea>
</P>
<p>
	<input type="Submit" value="Gem ændringer"/>
</P>
</form>
<?php

		}
	}
	bottom();//this is the html bottom
?>
