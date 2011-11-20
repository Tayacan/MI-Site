<?php require("util.php");//thus is the html top
 top();
?>
<div class='sletforum'>
</div>
<?php
$id=$_REQUEST["id"];
$sql=DELETE FROM fora WHERE id=".$id.";";

mysql_query($sql);
header("Location:index.php");
?>
<?php bottom();//this is the html bottom
?>