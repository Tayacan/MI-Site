<?php 
	require_once("util.php");//thus is the html top
	require_once('connect.php');
	require_once('auth.php');
	
	if(isset($_SESSION['LoggedIn'])) {
	
	top();
?>
<h2>Opret tråd</h2>
<form action="ny-traad.php" method="post">
<input type="hidden" name="foraID" value="<?php echo $_GET['foraID'];?>"/> <!-- relation, husk foraID -->
	<p>
		<span class="label">Overskrift</span>
		<input type="text" name="overskrift"size="100"/>
		<br/>
		<span class="label">Beskrivelse</span>
<!--		<textarea cols="100 ROWS="10" name="description"></textarea>
		<br/>
	</p>-->

		<script type="text/javascript" src="text_edit.js"></script>
		<?php text_editor(); ?>

	<p>
		<input type="Submit"value="opret tråd"/>
	</p>

</form>
		
<?php 
		
	}
bottom();//this is the html bottom
?>
