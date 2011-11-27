<?php
	require_once('util.php');
	require_once('connect.php');
	top();

	/*
	 * Code for grabbing the latest articles
	 */
	$query = "SELECT * FROM articles ORDER BY articleID DESC";
	$articles = mysql_query($query) or die(mysql_error());

	// Get the latest written article - the first result.
	$latestArticle = mysql_fetch_array($articles);

	// Get the next 3 articles for display
	$arts = array();
	$arts[0] = mysql_fetch_array($articles);
	$arts[1] = mysql_fetch_array($articles);
	$arts[2] = mysql_fetch_array($articles);
?>

<div style="">

	<div class="box" style="width: 625px; height: 250px;">
		<h3>Seneste forum-aktivitet</h3>
		<div style="width:55%;height:100%;float:left;">
			hej1
		</div>
		<div style="height:100%;float:left;">
			hej2
		</div>
	</div>
	<div class="box" style="width: 625px; height: 150px;">
		<h3>Seneste artikler</h3>
		<a href="viewArticle.php?id=<?php echo $latestArticle['articleID']; ?>" style="text-decoration: none; color: black;">
		<div style="width:55%;height:118px;float:left;text-align:justify;border-right: 1px solid #8080FF;padding:5px;">
			<?php
				if($latestArticle !== null) {
					echo "<h2 style='margin: 0;'><u>".$latestArticle['title']."</u></h2>";
					$stringToPrint = $latestArticle['text'];
					$stringToPrint = substr($stringToPrint, 0, 200)."...";

					echo '<script type="text/javascript" src="google-code-prettify/src/prettify.js"></script>';
					echo '<script type="text/javascript" src="text_edit.js"></script>';
					echo '<script type="text/javascript">';
					//echo 'window.onload = function () {prettyPrint(); };';
					echo 'var textToWrite = "'.mysql_real_escape_string($stringToPrint).'";';
					echo 'textToWrite = view_text(textToWrite);';
					echo 'document.write(textToWrite);';
					echo '</script>';
				}
			?>
		</div></a>
		<div style="position: relative; margin-left: 360px; margin-top: 10px;">
			<?php
				echo '<a class="boxlink" href="viewArticle.php?id='.$arts[0]['articleID'].'">'.$arts[0]['title'] . '</a><br />';
				echo '<a class="boxlink" href="viewArticle.php?id='.$arts[1]['articleID'].'">'.$arts[1]['title'] . '</a><br />';
				echo '<a class="boxlink" href="viewArticle.php?id='.$arts[2]['articleID'].'">'.$arts[2]['title'] . '</a><br />';
			?>
		</div>
	</div>

</div>
<?php
	bottom();
?>
