<?php
	require_once('util.php');
	top('Register new user', '');

	if(!empty($_GET['error'])) {
		if($_GET['error'] == 1){
			echo "<span style='color:red;'>Please fill out all fields.</span><br /><br />";
		} else if($_GET['error'] == 2) {
			echo "<span style='color:red;'>Password doesn't match - did you mistype?</span><br /><br />";
		} else if ($_GET['error'] == 3) {
			echo "<span style='color:red;'>Username already exists :(</span><br /><br />";
		}
	}
?>
	<form method="post" action="registerBackend.php">
		Desired username: <br />
		<input maxlength="15" type="text" name="username" /><br /><br />
		Password: <br />
		<input type="password" name="password1" /><br /><br />
		Retype password: <br />
		<input type="password" name="password2" /><br /><br />
		First name: <br />
		<input maxlength="30" type="text" name="firstname" /><br /><br />
		Last name: <br />
		<input maxlength="30" type="text" name="lastname" /><br /><br />
		E-mail: <br />
		<input maxlength="30" type="text" name="email" /><br /><br />
		<input type="submit" value"Registrer" name="register" />
	</form>
<?php
	bottom();
?>
