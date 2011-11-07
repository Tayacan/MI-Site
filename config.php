<!--
        This file is for configuring the database. 
        Every time you make changes to the structure
        of the database, you'll need to update this 
        file to do the same automatically. Remember
        to make if statements to check if the 
        table/column/whatever you're changing isn't
        already configured as it should be.
-->

<?php
        if($conn = mysql_connect('localhost',$_POST['mysql_username'],$_POST['mysql_pw'])) {
		echo "Logged in!<br />";
		echo 'Checking database miForum<br />';
                if(!mysql_select_db("miForum")) {
			echo 'Creating database<br />';
                        mysql_query("CREATE DATABASE  `miForum` ;") or die(mysql_error());
			echo 'Created database miForum<br />';
			mysql_select_db("miForum") or die("Something went wrong, can't connect to the new database!");
                } else {
			echo 'Database already there.<br />';
		}
		$checkUsers = "SELECT * FROM users;";
		$result = mysql_query($checkUsers);
		echo 'Checking table users<br />';
		if(!$result) {
			echo 'Creating table users.<br />';
			$makeUsers = "	CREATE TABLE  `miForum`.`users` (
					`userID` INT( 10 ) NOT NULL AUTO_INCREMENT ,
					`user` VARCHAR( 15 ) NOT NULL ,
					`password` VARCHAR( 20 ) NOT NULL ,
					`firstname` VARCHAR( 30 ) NOT NULL ,
					`lastname` VARCHAR( 30 ) NOT NULL ,
					`email` VARCHAR( 30 ) NOT NULL ,
					PRIMARY KEY (  `userID` ) ,
					INDEX (  `userID` ) ,
					UNIQUE (
						`user` ,
						`email`
					)
					) ENGINE = INNODB;";
			mysql_query($makeUsers) or die(mysql_error());
			echo 'Created table users<br />';
                
        	} else {
			// Code for checking columns of table.
		}
		$checkCats = "SELECT * FROM categories;";
		$result = mysql_query($checkCats);
		echo 'Checking table categories<br />';
		if(!$result) {
			echo 'Creating table categories.<br />';
			$makeCats = "	CREATE TABLE  `miForum`.`categories` (
					`categoryID` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
					`categoryName` VARCHAR( 30 ) NOT NULL ,
					`description` TEXT NULL ,
					UNIQUE (
						`categoryName`
					)
					) ENGINE = INNODB;";
			mysql_query($makeCats) or die(mysql_error());
			echo 'Created table categories<br />';
                
        	} else {
			// Code for checking columns of table.
		}
		$checkAdmins = "SELECT * FROM adminList;";
		$result = mysql_query($checkAdmins);
		echo 'Checking table adminList<br />';
		if(!$result) {
			echo 'Creating table adminList.<br />';
			$makeAdmins = "	CREATE TABLE  `miForum`.`adminList` (
					`forumID` INT NOT NULL ,
					`adminID` INT NOT NULL
					) ENGINE = INNODB;";
			mysql_query($makeAdmins) or die(mysql_error());
			echo 'Created table adminList<br />';
                
        	} else {
			// Code for checking columns of table.
		}
		$checkFora = "SELECT * FROM fora;";
		$result = mysql_query($checkFora);
		echo 'Checking table fora<br />';
		if(!$result) {
			echo 'Creating table fora.<br />';
			$makeFora = "	CREATE TABLE  `miForum`.`fora` (
					`foraID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
					`name` VARCHAR( 30 ) NOT NULL ,
					`categoryID` INT( 10 ) NOT NULL ,
					`description` TEXT NULL
					) ENGINE = INNODB;";
			mysql_query($makeFora) or die(mysql_error());
			echo 'Created table fora<br />';
                
        	} else {
			// Code for checking columns of table.
		}
		$checkThreads = "SELECT * FROM threads;";
		$result = mysql_query($checkThreads);
		echo 'Checking table threads<br />';
		if(!$result) {
			echo 'Creating table threads.<br />';
			$makeThreads = "CREATE TABLE  `miForum`.`threads` (
					`threadID` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
					`name` VARCHAR( 30 ) NOT NULL ,
					`foraID` INT NOT NULL ,
					`description` TEXT NOT NULL
					) ENGINE = INNODB;";
			mysql_query($makeThreads) or die(mysql_error());
			echo 'Created table threads<br />';
                
        	} else {
			// Code for checking columns of table.
		}
		$checkPosts = "SELECT * FROM post;";
		$result = mysql_query($checkPosts);
		echo 'Checking table post<br />';
		if(!$result) {
			echo 'Creating table post.<br />';
			$makePosts = "	CREATE TABLE  `miForum`.`post` (
					`postID` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
					`threadID` INT( 10 ) NOT NULL ,
					`userID` INT( 10 ) NOT NULL ,
					`text` LONGTEXT NOT NULL
					) ENGINE = INNODB;";
			mysql_query($makePosts) or die(mysql_error());
			echo 'Created table post<br />';
                
        	} else {
			// Code for checking columns of table.
		}
		// Create mi-site user.
		$checkUser = "SELECT user FROM mysql.user WHERE user='misite'";
		if(mysql_num_rows(mysql_query($checkUser)) < 1) {
			$query = "CREATE USER 'misite'@'localhost' IDENTIFIED BY  'kummefryser';";
			$grant = "GRANT ALL PRIVILEGES ON  `miForum` . * TO  'misite'@'localhost' WITH GRANT OPTION ;"; // F**king long query.
			mysql_query($query) or die(mysql_error());
			mysql_query($grant) or die(mysql_error());
			
			echo "Created user misite";
		}
	}
?>

<a href="index.php">Return to Index page</a>
