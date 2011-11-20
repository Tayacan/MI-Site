<?php
	require_once('../util.php'); //To make sure that util.php is only required once
	top("","../");
	
	//Checks if loginBackend has noticed any errors, if it has, it gives a fitting errormessage
	if(isset($_GET['error'])){
		switch($_GET['error']){
		
			case 1:
				echo "<span style='color:red;'>Manglende brugernavn eller adgangskode.</span><br /><br />";
				break;
			
			case 2:
				echo "<span style='color:red;'>Forkert brugernavn eller adgangskode.</span><br /><br />";
				break;
			
			case 3:
				echo "<span style='color:red;'>Du skal være logget ind for at udfører denne handling!</span><br /><br />";
				break;
				
			default:
				echo "<span style='color:red;'>Ukendt fejl.</span><br /><br />";
				break;
		}
	}	

?>

<!-- Loginform with button and everything ^^ -->	
<form action="loginBackend.php" method="post">
	Brugernavn:<br />
	<input type="text" name="username" />
	<br />

	Password:<br />
	<input type="password" name="password" />
	<br />

	<input type="Submit" value="Login" />
</form>

Ingen bruger endnu? <a href="register.php">Registrer dig her!</a>

<?php
	bottom();
?>
