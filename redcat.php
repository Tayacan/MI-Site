<?php //this is the php datebase code
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	top();
?>
<?php
$id =$_GET["categoryid"];
$finder = mysql_query("SELECT * FROM categories WHERE categoryID = ".$id.";");
while($row=mysql_fetch_array($finder)){
$rednavn = $row['categoryName'];
$redtekst = $row['description'];
}
?>
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
	<input type="Submit" value="opret indlæg"/>
</P>
</form>
<?php bottom();//this is the html bottom
?>