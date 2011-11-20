<?php
	
	if(!$_GET['id']) {
		header('Location: articles.php');
	}

	require('connect.php');
	require('util.php');

	top();

	echo "<div style='margin-left: 5px; margin-right: 5px;margin-bottom: 20px;'>";

	$id = mysql_real_escape_string($_GET['id']);
	$query = "SELECT * FROM articles WHERE articleID = ".$id.";";

	$result = mysql_query($query) or die(mysql_error());

	while($row = mysql_fetch_array($result)) {
		$authorName = 'Unknown';
		$getAuthor = "SELECT firstname, lastname FROM users WHERE userID = '".$row['writerID']."';";
		$writerResult = mysql_query($getAuthor) or die(mysql_error());
		while($writer = mysql_fetch_array($writerResult)) {
			$authorName = $writer['firstname'] . ' ' . $writer['lastname'];
		}
		echo '<h2>'.$row['title'].'</h2>';
		echo '<i>by '.$authorName.'</i><br /><br />';
		echo '<script type="text/javascript" src="google-code-prettify/src/prettify.js"></script>';
		echo '<script type="text/javascript" src="text_edit.js"></script>';
		echo '<script type="text/javascript">';
		echo 'window.onload = function () {prettyPrint(); };';
		echo 'var textToWrite = "'.mysql_real_escape_string($row['text']).'";';
		echo 'textToWrite = view_text(textToWrite);';
		echo 'document.write(textToWrite);';
		echo '</script>';
	}

	echo "</div>";

	bottom();
?>
