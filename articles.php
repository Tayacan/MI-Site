<!-- This file display the entire list of articles -->

<script type="text/javascript" src="text_edit.js"></script>
<?php
	require('connect.php');
	require('util.php');
	top();

	$get_articles = "SELECT * FROM `articles`";

	$result = mysql_query($get_articles) or die(mysql_error());

	echo "<div style='margin-left:5px;margin-right:5px;'>";

	echo "<h2>Articles</h2>";

	while($row = mysql_fetch_array($result)) {
		echo "<a href='viewArticle.php?id=".$row['articleID']."'>";
		echo $row["title"]."<br />" ;
		echo "</a>";
	}

	echo "<a href='writeArticle.php'>Write new article</a>";
	echo "</div>";

	bottom();
?>
