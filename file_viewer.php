<?php
	if ($handle = opendir('.')) { // Try opening current directory.
		echo "<div>";
		echo "Directory handle: $handle<br />";
		echo "Files:<br />";
		
		while (false !== ($file = readdir($handle))) { // Check that $file does not evaluate to any false value. Put next file in $file variable.
			if ($file != '.' && $file != '..' && $file != '.git') { // Exclude certain files (the current and parent directory, the .git dir.
				if(!make_box($file,'',$file)) {
					echo "<a href='$file'>$file</a><br />"; // Link to the file.
				}
			}
		}
		echo "</div>";
		
		closedir($handle); // Close directory
	}
?>
