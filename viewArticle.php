<?php
	
	if(!$_GET['id']) {
		header('Location: articles.php');
	}

	require('connect.php');
	require('util.php');

	top();

	echo "<div style='margin-left: 5px; margin-right: 5px;'>";

	$id = mysql_real_escape_string($_GET['id']);
	$query = "SELECT * FROM articles WHERE articleID = ".$id.";";

	$result = mysql_query($query) or die(mysql_error());

	while($row = mysql_fetch_array($result)) {
		echo '<h2>'.$row['title'].'</h2>';
		echo '<script type="text/javascript" src="text_edit.js"></script>';
		echo '<script type="text/javascript">';
		echo 'var textToWrite = "'.mysql_real_escape_string($row['text']).'";';
		echo 'textToWrite = view_text(textToWrite);';
		echo 'document.write(textToWrite);';
		echo '</script>';
	}

	echo "</div>";

	bottom();
?>
