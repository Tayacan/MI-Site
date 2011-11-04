<?php
	$newUser = "";

	// Check that everything is set:
	if(!$_POST['username'] || !$_POST['password1'] || !$_POST['password2'] || !$_POST['firstname'] || !$_POST['lastname'] || !$_POST['lastname'] || !$_POST['email']) {
		header('Location: register.php?error=1');
	} else if($_POST['password1'] != $_POST['password2']) {
		header('Location: register.php?error=2');
	}

	if($conn = mysql_connect('localhost','root','tayacan')) {
		mysql_select_db('miForum') or die(mysql_error());

		// Sanitize input
		$username = mysql_real_escape_string($_POST['username']);
		$password = md5(mysql_real_escape_string($_POST['password1']));
		$firstname = mysql_real_escape_string($_POST['firstname']);
		$lastname = mysql_real_escape_string($_POST['lastname']);
		$email = mysql_real_escape_string($_POST['email']);

		$checkUserName = "SELECT * FROM users WHERE user='".$username."';";

		$newUser = "INSERT INTO users (user,password,firstname,lastname,email) VALUES ('".$username."','".$password."','".$firstname."','".$lastname."','".$email."');";
		$check = mysql_query($checkUserName) or die(mysql_error());
		if(mysql_num_rows($check) > 0) {
			header('Location: register.php?error=3');
		}

	}	
?>

<?php
	require('../util.php');
	top('','../');
	if(mysql_query($newUser)) {
		echo "User created.";
	}
	bottom();
?>
