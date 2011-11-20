<?php //this is the php datebase code
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	top();
?>
<h1>Opret kategori</h1>
<form action="newcat.php" method="post">
<p>
		<span class="label">overskrift:</span>
		<input type="text" name="overskrift" size="80"/>
		<br/>
		<span class="label">beskrivelse:</span>
		<textarea cols="60" rows="10" name="beskrivelse"></textarea>
</P>
<p>
	<input type="Submit" value="opret indlæg"/>
</P>
</form>

<?php bottom();//this is the html bottom
?>