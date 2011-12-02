<?php
	require_once("util.php");
	require_once('connect.php');
	require_once('auth.php');
	
	// tjekker om man er admin
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			
			// her tjekkes om feltet overskrift står tomt og sender fejlbesked 1 hvis det gør, man bliver diregeret tilbaget til opretcat hvis det er
			if(!$_POST['overskrift']) {
				header('Location: opretcat.php?error=1');
				exit;
			}
			
			$overskrift=mysql_real_escape_string($_POST["overskrift"]); // her er der taget højde for beskyttelse mod sql injektion
			$beskrivelse=mysql_real_escape_string($_POST["beskrivelse"]); // -||-
			
			$chekcat = 'SELECT categoryName FROM categories WHERE categoryName = "'.$overskrift.'";';//tjekker om kategorien er blevet oprette før
			$checkname = mysql_query($chekcat) or die(mysql_error());
			if(mysql_num_rows($checkname) >0){ /*spørg maya
			
			
			aodpasasf
			sas
			adfasfdjasdfnasfd
			
			
			
			*/
				header('Location: opretcat.php?error=2');
				exit;
			}
			//Her bliver en den nye kategori oprettet i databasen
			$sql="INSERT INTO categories(categoryName,description) 
				VALUES('".$overskrift."','".$beskrivelse."');";
			mysql_query($sql);
			top();
			
			echo($sql); // her udskrives sql koden til fejlfinding
			echo "<a href='adminmenu.php'>tilbage</a>";//tilbage link
		}
	}

bottom();//this is the html bottom
?>
