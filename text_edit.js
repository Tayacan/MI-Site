function view_text (text) {
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

	// Remove newlines
	text = text.replace(/\[code\]\r\n/gi, "[code]");
	text = text.replace(/\[code\]\n/gi, "[code]");

	// Exchange newlines for <br />
	text = text.replace(/\n/gi, "<br />");
	text = text.replace(/\r/gi, ""); // Kill the carriage returns!
	
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
	text = text.replace(/\<br \/\>\<\/pre\>/gi, "</pre>");
	
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
	text = text.replace(/\[\:\@]/gi, "<img src='icons/angry.png' class='smiley' />");
	text = text.replace(/\[\:\*]/gi, "<img src='icons/kissy.png' class='smiley' />");
	text = text.replace(/\[nervous]/gi, "<img src='icons/nervous.png' class='smiley' />");
	text = text.replace(/\[\:x]/gi, "<img src='icons/vault.png' class='smiley' />");
	
	// Print the text in the div made for it.
	return text;
}

function mod_selection (val1,val2) {
	// Get the text area
	var textArea = document.getElementById('my_text');
	
	// IE specific code.
	if( -1 != navigator.userAgent.indexOf ("MSIE") ) { 
		
		var range = document.selection.createRange();
		var stored_range = range.duplicate();
		
		if(stored_range.length > 0) {
			stored_range.moveToElementText(textArea);
			stored_range.setEndPoint('EndToEnd', range);
			textArea.selectionStart = stored_range.text.length - range.text.length;
			textArea.selectionEnd = textArea.selectionStart + range.text.length;
		}
	}
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
	
	// IE specific code.
	if( -1 != navigator.userAgent.indexOf ("MSIE") ) { 
		
		var range = document.selection.createRange();
		var stored_range = range.duplicate();
		
		if(stored_range.length > 0) {
			stored_range.moveToElementText(textArea);
			stored_range.setEndPoint('EndToEnd', range);
			textArea.selectionStart = stored_range.text.length - range.text.length;
			textArea.selectionEnd = textArea.selectionStart + range.text.length;
		}
		/*else { //If IE bugs when trying to insert smileys, try to uncomment this code.
			textArea.focus();
			stored_range = document.selection.createRange();
			stored_range.moveStart('character',-textArea.value.length);
			textArea.selectionStart = stored_range.text.length;
			textArea.selectionEnd = stored_range.text.length;
		}*/
	}

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

