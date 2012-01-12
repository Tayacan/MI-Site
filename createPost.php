<?php
	require_once('connect.php');
	require_once('util.php');
	require_once('auth.php');

	$id = $_POST['threadID'];

	$text = mysql_real_escape_string($_POST['written_text']);

	$query = "INSERT INTO post (threadID, userID, text)
			VALUES (".$id.",".$_SESSION['LoggedIn'].",'".$text."');";

	mysql_query($query) or die(mysql_error());

	header('Location: viewThread.php?threadID='.$id.'&catID='.$_POST['catID'])
?>
