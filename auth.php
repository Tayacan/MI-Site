<?php
	//Include this for protected pages (Where you have to be logged in)	
	session_start();
	
	if(!isset($_SESSION['LoggedIn'])){
		header('Location: login.php?error=3');
	}
?>