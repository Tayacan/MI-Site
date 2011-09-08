<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- This is a larger comment :O //-->
	<!-- Comment fra maya! -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Text editor</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	
	<script type="text/javascript">
		function view_text () {
			// Find html elements.
			var textArea = document.getElementById('my_text');
			var div = document.getElementById('view_text');
			
			// Put the text in a variable so we can manipulate it.
			var text = textArea.value;
			
			// Make sure html and php tags are unusable by disabling < and >.
			text = text.replace(/\</gi, "&lt;");
			text = text.replace(/\>/gi, "&gt;");
			
			// Exchange newlines for <br />
			text = text.replace(/\n/gi, "<br />");
			
			// Basic BBCodes.
			text = text.replace(/\[b\]/gi, "<b>");
			text = text.replace(/\[\/b\]/gi, "</b>");
			
			text = text.replace(/\[i\]/gi, "<i>");
			text = text.replace(/\[\/i\]/gi, "</i>");
			
			text = text.replace(/\[u\]/gi, "<u>");
			text = text.replace(/\[\/u\]/gi, "</u>");
			
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
	</script>
	
	
</head>
<body>
	
	<!-- Knapper -->
	<input type="button" value="B" onclick="mod_selection('[b]','[/b]')" />
	<input type="button" value="I" onclick="mod_selection('[i]','[/i]')" />
	<input type="button" value="U" onclick="mod_selection('[u]','[/u]')" />
	<br />
	
	<!-- Text area -->
	<textarea class="text_edit" id="my_text"></textarea>
	<br />
	
	<!-- Submit button -->
	<input type="button" value="Vis tekst" onclick="view_text()" />
	
	<!-- Empty div to put the text in -->
	<div id="view_text">
	</div>

</body>
</html>