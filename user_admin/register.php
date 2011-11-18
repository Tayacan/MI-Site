<?php
	require_once('../util.php');
	top('Register new user', '../');

	if(!empty($_GET['error']) && $_GET['error'] == 1) {
		echo "<span style='color:red;'>Please fill out all fields.</span><br /><br />";
	}
?>
	<form method="post" action="registerBackend.php">
		Desired username: <br />
		<input type="text" name="username" /><br /><br />
		Password: <br />
		<input type="password" name="password1" /><br /><br />
		Retype password: <br />
		<input type="password" name="password2" /><br /><br />
		First name: <br />
		<input type="text" name="firstname" /><br /><br />
		Last name: <br />
		<input type="text" name="lastname" /><br /><br />
		E-mail: <br />
		<input type="text" name="email" /><br /><br />
		<input type="submit" value"Registrer" name="register" />
	</form>
<?php
	bottom();
?>
