<!-- This file display the entire list of articles -->

<script type="text/javascript" src="text_edit.js"></script>
<?php
	require('connect.php');
	require('util.php');
	top();

	$get_articles = "SELECT * FROM `articles`";

	$result = mysql_query($get_articles) or die(mysql_error());


	while($row = mysql_fetch_array($result)) {
		echo $row["title"]."<br />" ;
?>

<script type="text/javascript">
	var textToWrite = "<?php echo $row['text']; ?>";
	textToWrite = view_text(textToWrite);
	document.write("hey");
</script>
<?php
	}

	bottom();
?>
