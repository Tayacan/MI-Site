<?php
	require('util.php');
	top();
?>

<form method="post" action="config.php">
MySQL Username<br />
<input type="text" name="mysql_username" /><br />
MySQL Password<br />
<input type="password" name="mysql_pw" /><br />
<input type="submit" value="Submit" name="submitted" />
</form>

<?php
	bottom();
?>
