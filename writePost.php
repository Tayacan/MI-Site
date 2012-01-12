<?php
	require_once('connect.php');
	require_once('util.php');
	require_once('auth.php');

	top();

?>

<form action="createPost.php" method="post">
	<input type="hidden" name="threadID" value="<?php echo $_GET['threadID']; ?>" />
	<input type="hidden" name="catID" value="<?php echo $_GET['catID'] ?>" />
	Svar paa traad:<br />
	<script type="text/javascript" src="text_edit.js"></script>
	<?php text_editor(); ?>

	<input type="submit" value="Svar" />
</form>

<?php

	bottom();
?>
