$checkLogin = "SELECT * FROM users WHERE user='".mysql_real_escape_string($_POST['username'])."' AND password='".md5(mysql_real_escape_string($_POST['password']))."';";
