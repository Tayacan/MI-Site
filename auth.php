<?php
	//Include this for protected pages (Where you have to be logged in)	
	session_start();
	$dir = '';
		
	if(!isset($_SESSION['LoggedIn'])){
		header('Location: '.$dir.'login.php?error=3');
	}
?>
