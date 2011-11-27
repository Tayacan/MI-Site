<?php 	
require_once("util.php");//thus is the html top
require_once('connect.php');
require_once('auth.php');
	
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
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
		}
	}
	bottom();//this is the html bottom
?>