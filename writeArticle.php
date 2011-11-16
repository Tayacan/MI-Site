<?php
	require('connect.php');
	require('util.php');
	top();
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
