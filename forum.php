<?php //this is the php datebase code
$forbindelse=mysql_connect("localhost","root","");
mysql_select_db("miForum");
?>
<?php require("util.php");//thus is the html top
	top();
?>
<?php bottom();//this is the html bottom
?>
