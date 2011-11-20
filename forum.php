<?php //this is the php datebase code
$forbindelse=mysql_connect("localhost","root","");
mysql_select_db("miForum");
?>
<?php require_once("util.php");//thus is the html top
	top();
?>
<h1> Admin menu </h1>
<p>
	<a href="opretcat.php">Opret kategori<a/><br/>
	<a href="rediger.php">Rediger i kategori<a/><br/>
	
</p>
<div class='kategori'>

</div>
<?php bottom();//this is the html bottom
?>
