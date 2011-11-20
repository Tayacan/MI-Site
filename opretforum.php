<?php require("util.php");//thus is the html top
 top();
?>
<div class='opretforum'>
</div>

<h1>Opret forum</h1>
<form action="nyt-forum.php" method="post">
<p>
	<span class="label">Name</span>
	<input type="text" name="name"size="100"/>
	<br/>
	<span class="label">CategoryID</span>
	<p>her skal man kunne vaelge hvilken kategori man vil oprette forummet under</p>
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