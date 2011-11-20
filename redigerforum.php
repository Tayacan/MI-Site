<?php require("util.php");//thus is the html top
 top();
?>
<div class='redigerforum'>
</div>

<h1>Rediger forum</h1>
<p>vaelg et forum som du vil redigere</p>
<p>
<?php
	$resultat=mysql_query("SELECT id, name FROM fora ORDER BY id DESC");
	while ($post=mysql_fetch_array($resultat)) {
		echo '<a href="opretforum.php?id='.$post["id"].'">';
		echo $post["name"];
		echo '</a>&nbsp;';
		echo '<a href=sletforum.php?id='.$post["id"].'">Slet</a>';
		echo '<br/>';
		}
?>
</p>

<?php bottom();//this is the html bottom
?>