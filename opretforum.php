<?php 
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	require_once('auth.php');
	
	//admin tjek
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
<!-- ligesom i opret kategori, kan der oprettes fora-->
<h2>Opret forum</h2>
<form action="nyt-forum.php" method="post">
<input type="hidden" name="catID" value="<?php echo $_GET['catID'];?>"/>
	<p>
		<span class="label">Name</span>
		<input type="text" name="overskrift"size="100"/>
		<br/>
		<span class="label">Description</span>
		<textarea cols="100 ROWS="10" name="description"></textarea>
		<br/>
	</p>
	<p>
		<input type="Submit"value="opret forum"/>
	</p>
</form>
		
<?php 
		}
	}
bottom();//this is the html bottom
?>