<?php
	require_once('util.php');
	require_once('connect.php');
	top();

	/*
	 * Code for grabbing the latest articles and threads
	 */
	$queryArts = "SELECT * FROM articles ORDER BY articleID DESC";
	$queryThreads = "SELECT * FROM threads ORDER BY threadID DESC";
	$articles = mysql_query($queryArts) or die(mysql_error());
	$threads = mysql_query($queryThreads) or die(mysql_error());

	// Get the latest written article - the first result.
	$latestArticle = mysql_fetch_array($articles);

	// Get the next 3 articles for display
	$arts = array();
	$arts[0] = mysql_fetch_array($articles);
	$arts[1] = mysql_fetch_array($articles);
	$arts[2] = mysql_fetch_array($articles);

	// Same for threads
	$latestThread = mysql_fetch_array($threads);

	$thr = array();
	$thr[0] = mysql_fetch_array($threads);
	$thr[1] = mysql_fetch_array($threads);
	$thr[2] = mysql_fetch_array($threads);

	// Get categories of threads:
	//$getCats = "SELECT categoryID FROM fora WHERE foraID=";
?>

<div>

	<div class="box" style="width: 625px; height: 150px;">
		<h3>Seneste forum-aktivitet</h3>
		<a href="viewThread.php?threadID=<?php echo $latestThread['threadID']; ?>
				style="text-decoration: none; color: black;">
		<div style="width:55%;height:118px;float:left;text-align:justify;
				border-right: 1px solid #8080FF;padding:5px;">
			<?php
				if($latestThread !== null) {
					echo "<h2 style='margin: 0;'><u>".$latestThread['name']."</u></h2>";
					$stringToPrint = $latestThread['description'];
					$stringToPrint = preg_replace("/\[code\]/", "", $stringToPrint);
					$stringToPrint = preg_replace("/\[\/code\]/", "", $stringToPrint);
					$stringToPrint = preg_replace("/\\n/", " ", $stringToPrint);
					$stringToPrint = substr($stringToPrint, 0, 200)."...";
					//$stringToPrint = preg_match($pattern, $stringToPrint);

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
				echo '<a class="boxlink" href="index.php?id='.$thr[0]['threadID'].'">'.$thr[0]['name'] . '</a><br />';
				echo '<a class="boxlink" href="index.php?id='.$thr[1]['threadID'].'">'.$thr[1]['name'] . '</a><br />';
				echo '<a class="boxlink" href="index.php?id='.$thr[2]['threadID'].'">'.$thr[2]['name'] . '</a><br />';
			?>
		</div>
		
	</div>
	<div class="box" style="width: 625px; height: 150px;">
		<h3>Seneste artikler</h3>
		<a href="viewArticle.php?id=<?php echo $latestArticle['articleID']; ?>" 
				style="text-decoration: none; color: black;">
		<div style="width:55%;height:118px;float:left;text-align:justify;
				border-right: 1px solid #8080FF;padding:5px;">
			<?php
				if($latestArticle !== null) {
					echo "<h2 style='margin: 0;'><u>".$latestArticle['title']."</u></h2>";
					$stringToPrint = $latestArticle['text'];
					$stringToPrint = preg_replace("/\[code\]/", "", $stringToPrint);
					$stringToPrint = preg_replace("/\[\/code\]/", "", $stringToPrint);
					$stringToPrint = preg_replace("/\\n/", " ", $stringToPrint);
					$stringToPrint = substr($stringToPrint, 0, 200)."...";
					//$stringToPrint = preg_match($pattern, $stringToPrint);

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
