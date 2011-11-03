<?php
	require('util.php');
?>

<?php
	top();
	$textedit_vals = array('Text editor','This is the text editor for the forum.','./text_edit.php');
	$chatbox_vals = array('Chatbox','The chatbox is currently under development.','./scroll_div.php');
	$index_vals = array('Home','The front page of the site.','./index.php');
	
	make_box($textedit_vals[0],$textedit_vals[1],$textedit_vals[2]);
	make_box($chatbox_vals[0],$chatbox_vals[1],$chatbox_vals[2]);
	make_box($index_vals[0],$index_vals[1],$index_vals[2]);
	bottom();
?>
