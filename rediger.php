<?php //this is the php datebase code
	require_once('connect.php');
	require_once('util.php');
	top();
	if(!empty($_GET['error'])){
		if($_GET['error']==1){
			echo "<span style='color: red;'>En katogori af samme navn er allerede oprettet</span>";
			echo "<a href='forum.php'>tilbage</a>";
		}
	}
 bottom();//this is the html bottom
?>
