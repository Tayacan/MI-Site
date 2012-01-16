<?php
	$overskrift=mysql_real_escape_string($_POST["overskrift"]);
	$beskrivelse=mysql_real_escape_string($_POST["beskrivelse"]);
	$sql="INSERT INTO categories(categoryName,description) 
		VALUES('".$overskrift."','".$beskrivelse."');";
	mysql_query($sql);
?>
