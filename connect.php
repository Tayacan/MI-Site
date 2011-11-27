<?php
	
	$dbhost = 'localhost';
	$dbuser = 'misite';
	$dbpass = 'kummefryser';

	$conn = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());

	if(!isset($conn)) {
		die("Couldn't connect to database.");
	} else {
		mysql_select_db('miForum') or die (mysql_error());
	}
?>
