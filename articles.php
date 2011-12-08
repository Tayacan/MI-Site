<!-- This file display the entire list of articles -->

<script type="text/javascript" src="text_edit.js"></script>
<?php
//	session_start();
	require_once('connect.php');
	require_once('util.php');
	top();

	$get_articles = "SELECT * FROM `articles` ORDER BY articleID DESC";

	$result = mysql_query($get_articles) or die(mysql_error());

	echo "<div style='margin-left:5px;margin-right:5px;'>";

	echo "<h2>Artikler</h2>";

	while($row = mysql_fetch_array($result)) {
		echo "<h3><a href='viewArticle.php?id=".$row['articleID']."'>";
		echo $row["title"]."<br />" ;
		echo "</a></h3><br />";
	}

	if(isset($_SESSION['LoggedIn'])) {
		echo "<br /><a href='writeArticle.php'><u>Skriv ny artikel</u></a>";
	} else {
		echo "<br /><a href='login.php'>Log in for at skrive en artikel</a>";
	}
	echo "</div>";
	

	bottom();
?>
