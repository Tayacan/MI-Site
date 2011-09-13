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
			
			// Smileys :D
			text = text.replace(/\[\:\)\]/gi, "<img src='icons/happy.png' class='smiley' />");
			text = text.replace(/\[\:D\]/gi, "<img src='icons/grin.png' class='smiley' />");
			text = text.replace(/\[\:\/\]/gi, "<img src='icons/hmm.png' class='smiley' />");
			text = text.replace(/\[B\)\]/gi, "<img src='icons/cool.png' class='smiley' />");
			text = text.replace(/\[\:\(\]/gi, "<img src='icons/sad.png' class='smiley' />");
			text = text.replace(/\[\:\'\(\]/gi, "<img src='icons/weepy.png' class='smiley' />");
			text = text.replace(/\[\;\)\]/gi, "<img src='icons/winky.png' class='smiley' />");
			text = text.replace(/\[blush]/gi, "<img src='icons/shame.png' class='smiley' />");
			text = text.replace(/\[\:O]/gi, "<img src='icons/surprise.png' class='smiley' />");
			text = text.replace(/\[\:P]/gi, "<img src='icons/tongue.png' class='smiley' />");
			text = text.replace(/\[O\:\)]/gi, "<img src='icons/angel.png' class='smiley' />");
			text = text.replace(/\[\:\$]/gi, "<img src='icons/cha-ching.png' class='smiley' />");
			
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
		
		function insert_smiley (smiley) {
			var textArea = document.getElementById('my_text');
			if (typeof(textArea.selectionStart) != "undefined") {
				var begin = textArea.value.substr(0, textArea.selectionStart);
				var end = textArea.value.substr(textArea.selectionEnd);
				
				textArea.value = begin + smiley + end;
			}
		}
		
		function scroll_fix () {
			var pre = document.getElementsByClass('prettyprint linenums:1');
			var objects = document.getElementsByTagName('ol');
			for(var i = 0; i < objects.length; i++) {
				objects[i].style.width = pre[0].width;
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
	
		<div id="smiley_buttons" style="float:top; display:block; height:300px; width:660px;">
			<!-- Text area -->
			<textarea class="text_edit" id="my_text" rows="10" cols="30"></textarea>
			
			<!-- Smiley buttons -->
			<button type="button" onclick="insert_smiley('[:)]')" style="float:left; margin:0;">
				<img src="icons/happy.png" class="smiley" alt="[:)]" title="[:)]" />
			</button>
			<button type="button" onclick="insert_smiley('[:D]')" style="float:left; margin:0;">
				<img src="icons/grin.png" class="smiley" alt="[:D]" title="[:D]" />
			</button>
			<button type="button" onclick="insert_smiley('[:/]')" style="float:left; margin:0;">
				<img src="icons/hmm.png" class="smiley" alt="[:/]" title="[:/]" />
			</button>
			<button type="button" onclick="insert_smiley('[B)]')" style="float:left; margin:0;">
				<img src="icons/cool.png" class="smiley" alt="[B)]" title="[B)]" />
			</button>
			<button type="button" onclick="insert_smiley('[:(]')" style="float:left; margin:0;">
				<img src="icons/sad.png" class="smiley" alt="[:(]" title="[:(]" />
			</button>
			<button type="button" onclick="insert_smiley('[:\'(]')" style="float:left; margin:0;">
				<img src="icons/weepy.png" class="smiley" alt="[:'(]" title="[:'(]" />
			</button>
			<button type="button" onclick="insert_smiley('[;)]')" style="float:left; margin:0;">
				<img src="icons/winky.png" class="smiley" alt="[;)]" title="[;)]" />
			</button>
			<button type="button" onclick="insert_smiley('[blush]')" style="float:left; margin:0;">
				<img src="icons/shame.png" class="smiley" alt="[blush]" title="[blush]" />
			</button>
			<button type="button" onclick="insert_smiley('[:O]')" style="float:left; margin:0;">
				<img src="icons/surprise.png" class="smiley" alt="[:O]" title="[:O]" />
			</button>
			<button type="button" onclick="insert_smiley('[:P]')" style="float:left; margin:0;">
				<img src="icons/tongue.png" class="smiley" alt="[:P]" title="[:P]" />
			</button>
			<button type="button" onclick="insert_smiley('[O:)]')" style="float:left; margin:0;">
				<img src="icons/angel.png" class="smiley" alt="[O:)]" title="[O:)]" />
			</button>
			<button type="button" onclick="insert_smiley('[:$]')" style="float:left; margin:0;">
				<img src="icons/cha-ching.png" class="smiley" alt="[:$]" title="[:$]" />
			</button>
		</div><br />
		
		<!-- Submit button -->
		<div>
			<input type="button" value="Vis tekst" onclick="view_text();prettyPrint()" />
		</div>
	</div>
	
	<!-- Empty div to put the text in -->
	<div id="view_text">
	</div>

</body>
</html>