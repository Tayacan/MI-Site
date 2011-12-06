<?php //this is the php datebase code
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	require_once('auth.php');
	
	//admin tjek
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			if(isset($_POST["catID"])){
				top();
				$id =$_POST['catID'];
				$overskrift=mysql_real_escape_string($_POST["overskrift"]);// taget højde for sql injektions 
				$beskrivelse=mysql_real_escape_string($_POST["beskrivelse"]);// -||-
				
				//her tjekkes om feltet overskrift står tomt og sender fejlbesked 1 hvis det gør, man bliver diregeret tilbaget til redcat hvis det er
				if(!$_POST['overskrift']) {
				header("Location: redcat.php?error=1&catID=$id");
				//&catID='.$id.'
				exit;
				}
				$chekcat = 'SELECT categoryName FROM categories WHERE categoryName = "'.$overskrift.'";';//tjekker om kategorien er blevet oprette før
				$checkname = mysql_query($chekcat) or die(mysql_error());
				if(mysql_num_rows($checkname) >0 && $overskrift != $_POST['oldname']){
					header("Location: redcat.php?error=2&catID=$id");
					//&catID='.$id.'
					exit;
				}
				$id =$_POST["catID"];
				//her opdateres overskrift og beskrivelse tabellen
				$sql="UPDATE categories SET categoryName='".$overskrift."', description='".$beskrivelse."' WHERE categoryID=".$id.";";
				mysql_query($sql) or die(mysql_error());
				echo($sql);
				echo "<a href='redcat.php?catID=".$id."'>tilbage</a>"; // tilbagelink
			}
			else{
			header('Location: redcat.php');
			}
		}
	}

bottom();//this is the html bottom
?>
