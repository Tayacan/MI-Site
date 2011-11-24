<?php require("util.php");//thus is the html top
 top();
?>
<h2>Opret forum</h2>
<form action="nyt-forum.php" method="post">
<input type="hidden" name="catID" value="<?php echo $_GET['categoryid'];?>"/>
	<p>
		<span class="label">Name</span>
		<input type="text" name="overskrift"size="100"/>
		<br/>
		<span class="label">Description</span>
		<textarea cols="100 ROWS="10" name="description"></textarea>
		<br/>
	</p>
	<p>
		<input type="Submit"value="opret forum"/>
	</p>
</form>
		
<?php bottom();//this is the html bottom
?>