<html>
<head>
	<script type="text/javascript">
	<!--
		function subMessage () {
			var text = document.getElementById("message").value;
			var textArea = document.getElementById("textarea");
			
			textArea.innerHTML = textArea.innerHTML + "<br /><span style='color:red;'>" + document.getElementById("username").value + ":</span> " + text;
			document.getElementById("message").value = "";
		}
	// -->
	</script>
	<script type="text/javascript">
	<!--
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
	<input type="text" name="message" id="message" style="width:500px;" /><br />
	<input type="text" name="username" id="username" /><br />
	<input type="button" value="click me" onclick="subMessage(); scrollDown();" />
	
	
</body>