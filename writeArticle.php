<?php
	require_once('connect.php');
	require_once('util.php');
	require_once('auth.php');
	top();

	if(isset($_GET['error'])) { // Error handling
		if($_GET['error'] == 1) {
			echo "<span style='color:red;'>Du har ikke skrevet noget.</span><br /><br />";
		}
	}
?>

<script type="text/javascript" src="text_edit.js"></script>
<form action="createArticle.php" method="post" >
<label>Titel: </label><input type="text" name="title" />
<?php
	text_editor();
?>

<div>
	<input type="submit" value="Gem" />
</div>
</form>

<?php
	bottom();
?>
