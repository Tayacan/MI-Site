<?php
	if ($handle = opendir('.')) {
		echo "Directory handle: $handle<br />";
		echo "Files:<br />";
		
		while (false !== ($file = readdir($handle))) {
			if ($file != '.' && $file != '..' && $file != '.git') {
				echo "<a href='$file'>$file</a><br />";
			}
		}
		
		closedir($handle);
	}
?>