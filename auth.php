<?php
	//Include this for protected pages (Where you have to be logged in)	
	session_start();
	$dir = '';
	if(basename(dirname(__FILE__)) != 'user_admin') $dir = 'user_admin/';
	
	if(!isset($_SESSION['LoggedIn'])){
		header('Location: '.$dir.'login.php?error=3');
	}
?>
