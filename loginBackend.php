<?php
	require_once('connect.php'); //To make sure that connect.php is only required once
	require_once('util.php'); //To make sure that util.php is only required once
	session_start();
	
	// Check that everything is set:
	if(!$_POST['username'] || !$_POST['password']) {
		header('Location: login.php?error=1');
		unset($_SESSION['LoggedIn']);
		exit;
	}
	
	//Arrays of which chars that should be replaced with what
	$search = array('<', '>');
	$replace = array('&lt;', '&gt;');
	
	$checkLogin = "SELECT * FROM users WHERE user='".mysql_real_escape_string(str_replace($search, $replace, $_POST['username']))."' AND password='".md5(mysql_real_escape_string($_POST['password']))."';";
	$result = mysql_query($checkLogin) or die(mysql_error());
	if(mysql_num_rows($result) < 1) {
		header('Location: login.php?error=2');
		unset($_SESSION['LoggedIn']);
		exit;
	}
	$row = mysql_fetch_array($result); //Henter valgte data fra databasen
	$_SESSION['LoggedIn'] = $row['userID'];
	
	top();
	
	header('Location: index.php');
	exit;
	
	bottom();
?>