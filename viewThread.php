<?php
	require_once('connect.php');
	require_once('util.php');

	top();

	if(!isset($_GET['threadID']) || $_GET['threadID'] == "") {
		header('Location: forum.php');
		exit;
	}

	$id = $_GET['threadID'];

	$getThread = "SELECT * FROM threads WHERE threadID=".$id;
	$thread = mysql_query($getThread) or die(mysql_error());

	if(mysql_num_rows($thread) != 1 || !$thread) {
		echo "Something went wrong! It seems the thread doesn't exist...<br />";
		exit;
	}

	$getPosts = "SELECT * FROM post WHERE threadID=".$id." 
						ORDER BY postID DESC";
	$posts = mysql_query($getPosts) or die(mysql_error());

	// Get info about thread
	$threadArr = mysql_fetch_array($thread);
	$title = $threadArr['name'];
	$authorID = $threadArr['userID'];
	$fora = $threadArr['foraID'];
	$text = $threadArr['description'];

	$author = "Unknown"; // Until otherwise proven
	$getAuthor = "SELECT firstname,lastname FROM users WHERE 
						userID=".$authorID;
	$res = mysql_query($getAuthor);
	if(mysql_num_rows($res) == 1) {
		$row = mysql_fetch_array($res);
		$author = $row['firstname']." ".$row['lastname'];
	}

	// Display the opening post of the thread
	echo "	<div class='box' style='width:97%;height:auto'>
			<h3><span>".$title."</span></h3>
			<p>Oprettet af: <i>".$author."</i></p>";
	echo '<script type="text/javascript" 
			src="google-code-prettify/src/prettify.js">
							</script>';
        echo '<script type="text/javascript" src="text_edit.js"></script>';
        echo '<script type="text/javascript">';
        echo 'window.onload = function () {prettyPrint(); };';
        echo 'var textToWrite = "'.mysql_real_escape_string($text).'";';
        echo 'textToWrite = view_text(textToWrite);';
	
	// For some reason not all the text ends up in the paragraph..
        echo 'document.write("<p>"+textToWrite+"</p>");'; 
        echo '</script>';
	echo "</div>";

	// Link to go back
	echo "<a href='vistraade.php?foraID=".$fora."&catID=".$_GET['catID']."'>
								Tilbage</a>";

	bottom();
?>
