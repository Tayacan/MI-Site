<?php
	require_once('connect.php');
	require_once('util.php');

	session_start();

	// Idiot obstacle course - are we logged in and do we have an article ID at all?
	if(!isset($_GET['id']) || !isset($_SESSION['LoggedIn'])) {
		header('Location: articles.php');
		exit;
	}
	$artID = mysql_real_escape_string($_GET['id']);

	$checkUser = "SELECT * FROM articles WHERE articleID=".$artID.";";
	$res = mysql_query($checkUser) or die(mysql_error());

	// Obstacle number two - are you the author?
	while($row = mysql_fetch_array($res)) {
		$isAdmQuery = "SELECT isAdmin FROM users WHERE userID = ".$_SESSION['LoggedIn'].";";
                $isAdm = mysql_query($isAdmQuery) or die(mysql_error());
                $admRow = mysql_fetch_array($isAdm);
		if($row['writerID'] !== $_SESSION['LoggedIn'] && $admRow['isAdmin'] != 1) {
			header('Location: articles.php');
			exit;
		}

		$artTitle = $row['title'];
		$artText = $row['text'];
	}

	// Now that we know it's the right user, we can start echo'ing html
	top();

	// If we edited stuff and pressed the save button
	if(isset($_POST['edTitle'])) {
		$updateQuery = "UPDATE articles SET text='".mysql_real_escape_string($_POST['written_text'])."', 
				title='".mysql_real_escape_string($_POST['edTitle'])."' WHERE articleID=".$artID.";";
		if(mysql_query($updateQuery) or die(mysql_error())) {
			echo "Artiklen er opdateret. <a href='viewArticle.php?id=".$artID."'>Tilbage</a>";
		}
	// If we're just about to edit
	} else {
?>

<script type="text/javascript" src="text_edit.js"></script>
<form method="post" action="editArticle.php?id=<?php echo $artID ?>">
	<label>Titel: </label><input type="text" name="edTitle" value="<?php echo $artTitle; ?>" />
	<?php text_editor($artText); ?>

	<div>
		<input type="submit" value="Gem ændringer" />
	</div>
</form>

<?php
	}
	bottom();
?>
