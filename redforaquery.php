<?php 
require_once("util.php");
require_once('connect.php');
require_once('auth.php');
	//admintjek
	$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
	$isadmin = mysql_query($admincheck) or die(mysql_error());
	while($row = mysql_fetch_array($isadmin)){
		if($row['isAdmin']==1){
			top();
			$id =$_POST['foraid'];
			$catID =$_POST['catID'];
			$overskrift=mysql_real_escape_string($_POST["overskrift"]);// taget h�jde for sql injektions 
			$beskrivelse=mysql_real_escape_string($_POST["beskrivelse"]);// -||-
				
			//her tjekkes om feltet overskrift st�r tomt og sender fejlbesked 1 hvis det g�r, man bliver diregeret tilbaget til redigerforum hvis det er
			if(!$_POST['overskrift']) {
			header("Location: redigerforum.php?error=1&foraid=$id&catID=$catID");
			exit;
		
			}
			// her s�ges der efter kategorier af samme navn, men kun hvis man har �ndret overskriften, da man gerne m� redigerer i beskrivelsen kun
			$checkfora = 'SELECT name FROM fora WHERE name = "'.$overskrift.'";';
			$chekckname = mysql_query($checkfora) or die(mysql_error());
			if(mysql_num_rows($chekckname) >0 && $overskrift != $_POST['oldname']){//variablen vi sendte fra rediferforum.php, kort sagt, mysql querry finder r�kker og num_rows angiver antal r�kker
				header("Location: redigerforum.php?error=2&foraid=$id&catID=$catID");
				exit;
			}
		
			// if(isset($_POST["foraid"])){
				// $id =$_POST["foraid"];
			$sql="UPDATE fora SET name='".$_POST["overskrift"]."', description='".$_POST["beskrivelse"]."' WHERE foraID=".$id.";";
			mysql_query($sql) or die(mysql_error());
			echo "<p>stuff works</p><a href='redcat.php?catID=".$catID."''>tilbage</a>";
			// }
		}
	}
bottom();//this is the html bottom
?>
