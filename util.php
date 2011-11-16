<?php
        function make_box($header,$text,$url) {
		/*
			Creates a pretty link-box with a header and some 
			content - you can put whatever you want in the 
			content, as long as it's no larger than 200x150 px.
		*/

                echo "<a href='".$url."'>";
                echo "<div class='box'>";
                echo "<h3><span>".$header."</span></h3>";
                echo "<p>".$text."</p>";
                echo "</div>";
                echo "</a>";
		return true;
        }

	function top($title = 'MI-Site', $cssdir = '') {
		/*
			Creates the header n' stuff. Use as the first thing on
			any page.
		*/
		$dir = $cssdir.'stylesheet.css';
		echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.1//EN' 'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>";

		echo "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>".$title."</title><link rel='stylesheet' type='text/css' href='".$dir."' /><link rel='stylesheet' type='text/css' href='".$cssdir."style.css'></head><body><div class='content'>";
		echo "<div style='margin: 5px;'><h1>Replace this with MI logo</h1></div>";
		menu();

	}

	function menu() {
		$mainPages = array(	'Forside' => 'index.php', 
					'Forum' => 'forum.php',
					'Artikler' => 'articles.php',
					'Om MI' => '#');

		echo "<div class='menu'>";

		foreach ($mainPages as $name => $page) {
			echo "<a class='menulink' href='".$page."'>".$name."</a>";
		}

		echo "</div>";
	}

	function bottom() {
		/*
			Ends tags - will later be used for a footer.
		*/
		if($conn) mysql_close($conn);

		echo "</div>";
		echo "</body>";
		echo "</html>";
	}
	
	function text_editor () {
		include('text_editor.php');
	}
?>
