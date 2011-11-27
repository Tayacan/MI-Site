<!-- This page adds the newly written article to the database. -->

<?php
	require_once('util.php');
	require_once('connect.php');
	require_once('auth.php');
	$userID = $_SESSION['LoggedIn'];

	// Nothing was written, go back to the writeArticle page.
	if(!$_POST['written_text']) {
		header('Location: writeArticle.php?error=1');
		exit;
	}

	$query = "	INSERT INTO articles (title,text,writerID) 
			VALUES ('".mysql_real_escape_string($_POST['title'])."','".mysql_real_escape_string($_POST['written_text'])."',".$userID.")";

	mysql_query($query) or die(mysql_error());

	mysql_close($conn);

	top();
	echo "Successfully created article.";	
?>
