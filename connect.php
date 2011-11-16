<?php
	$dbhost = 'localhost';
	$dbuser = 'misite';
	$dbpass = 'kummefryser';

	$conn = mysql_connect($dbhost,$dbuser,$dbpass);

	if(!$conn) {
		die("Couldn't connect to database.");
	} else {
		mysql_select_db('miForum') or die (mysql_error());
	}
?>
