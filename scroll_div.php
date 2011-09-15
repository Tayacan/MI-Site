<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Chat</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript">
	<!--
		function subMessage () {
			var text = document.getElementById("message").value;
			var textArea = document.getElementById("textarea");
			
			textArea.innerHTML = textArea.innerHTML + "<br /><span style='color:red;'>" + document.getElementById("username").value + ":</span> " + text;
			document.getElementById("message").value = "";
		}
		
		function scrollDown () {
			var textArea = document.getElementById("textarea");
			textArea.scrollTop = 200;
			setTimeOut('scrollDown()',200);
		}
	// -->
	</script>

</head>

<body>
	<div id="textarea"
	 style="border-style: solid;
	 border-width: 1px;
	 width:500px;
	 height:300px;
	 overflow:auto;">

	</div>
	<div>
	<input type="text" name="message" id="message" style="width:500px;" /><br />
	<input type="text" name="username" id="username" /><br />
	<input type="button" value="click me" onclick="subMessage(); scrollDown();" />
	</div>
	
	
</body>
</html>