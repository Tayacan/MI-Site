<?php //this is the php datebase code
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	require_once('auth.php');
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
		top();
?>
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
bottom();//this is the html bottom
?>