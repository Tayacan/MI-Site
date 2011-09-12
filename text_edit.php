<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- This is a larger comment :O //-->
	<!-- Comment fra maya! -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Text editor</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link href="google-code-prettify/src/prettify.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="google-code-prettify/src/prettify.js"></script>
	
	<script type="text/javascript">
	<!--
		function view_text () {
			// Find html elements.
			var textArea = document.getElementById('my_text');
			var div = document.getElementById('view_text');
			
			// Put the text in a variable so we can manipulate it.
			var text = textArea.value;
			
			// Make sure html and php tags are unusable by disabling < and >.
			text = text.replace(/\</gi, "&lt;");
			text = text.replace(/\>/gi, "&gt;");
			 
			/*
				Enable users to escape their square brackets.
				Replace | width html codes for [ and ] later.
				Would it be possible to find some logic that automatically escapes them inside <pre> tags?
			*/
			text = text.replace(/\\\[/gi,"&#91");
			text = text.replace(/\\\]/gi,"&#93");
			
			// Exchange newlines for <br />
			text = text.replace(/\n/gi, "<br />");
			
			// Basic BBCodes.
			text = text.replace(/\[b\]/gi, "<b>");
			text = text.replace(/\[\/b\]/gi, "</b>");
			
			text = text.replace(/\[i\]/gi, "<i>");
			text = text.replace(/\[\/i\]/gi, "</i>");
			
			text = text.replace(/\[u\]/gi, "<u>");
			text = text.replace(/\[\/u\]/gi, "</u>");
			
			// Code tags!
			text = text.replace(/\[code\]/gi, "<pre class='prettyprint linenums:1'>");
			text = text.replace(/\[\/code\]/gi, "</pre>");
			text = text.replace(/\<pre class=\'prettyprint linenums\:1\'\>\<br \/\>/gi, "<pre class='prettyprint linenums:1'>"); // Remove extra newline at start of code block.
			text = text.replace(/\<\/pre\>\<br \/\>/gi, "</pre>"); // Remove extra newline after code block.
			
			// Print the text in the div made for it.
			div.innerHTML = text;
		}
		
		function mod_selection (val1,val2) {
			// Get the text area
			var textArea = document.getElementById('my_text');
			
			// Do we even have a selection?
			if (typeof(textArea.selectionStart) != "undefined") {
				// Split the text in three pieces - the selection, and what comes before and after.
				var begin = textArea.value.substr(0, textArea.selectionStart);
				var selection = textArea.value.substr(textArea.selectionStart, textArea.selectionEnd - textArea.selectionStart);
				var end = textArea.value.substr(textArea.selectionEnd);
				
				// Insert the tags between the three pieces of text.
				textArea.value = begin + val1 + selection + val2 + end;
			}
		}
		
		function scroll_fix () {
			var div = document.getElementById('view_text');
			var objects = document.getElementsByTagName('ol');
			for(var i = 0; i < objects.length; i++) {
				objects[i].style.width = div.clientWidth;
			}
		}
	// -->
	</script>
	
	
</head>
<body onload="prettyPrint()">
	
	<div> <!-- Everything is in a div. -->
		<!-- Knapper -->
		<input type="button" value="[b]" class="tag_button" onclick="mod_selection('[b]','[/b]')" />
		<input type="button" value="[i]" class="tag_button" onclick="mod_selection('[i]','[/i]')" />
		<input type="button" value="[u]" class="tag_button" onclick="mod_selection('[u]','[/u]')" />
		<input type="button" value="[code]" class="tag_button" onclick="mod_selection('[code]','[/code]')" />
		<br />
	
		<!-- Text area -->
		<textarea class="text_edit" id="my_text" rows="10" cols="30"></textarea>
		<br />
	
		<!-- Submit button -->
		<input type="button" value="Vis tekst" onclick="view_text();prettyPrint()" />
	</div>
	
	<!-- Empty div to put the text in -->
	<div id="view_text">
	</div>

</body>
</html>