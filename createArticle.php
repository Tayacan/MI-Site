<!-- This page adds the newly written article to the database. -->

<?php
	// Nothing was written, go back to the writeArticle page.
	if(!$_POST['written_text']) {
		header('Location: writeArticle.php?error=1');
	}

	require('connect.php');

	$query = "INSERT INTO articles (title,text,writerID) VALUES ('test_title','".mysql_real_escape_string($_POST['written_text'])."',0)";
	echo $query;

	if (mysql_query($query)) {
		echo "Success!";
	} else {
		die(mysql_error());
	}

	mysql_close($conn);
?>
