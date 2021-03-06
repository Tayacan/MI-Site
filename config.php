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
			echo 'Creating table users.<br />'; //user, firstname, lastname and email is 4 time as big as allowed, so '<' and '>' can be replaced with '&lt;' and '&gt;'
			$makeUsers = "	CREATE TABLE  `miForum`.`users` (
					`userID` INT( 10 ) NOT NULL AUTO_INCREMENT ,
					`user` VARCHAR( 60 ) NOT NULL ,
					`password` VARCHAR( 50 ) NOT NULL ,
					`firstname` VARCHAR( 120 ) NOT NULL ,
					`lastname` VARCHAR( 120 ) NOT NULL ,
					`email` VARCHAR( 120 ) NOT NULL ,
					`isAdmin` TINYINT( 1 ) NOT NULL DEFAULT '0' ,
					PRIMARY KEY (  `userID` ) ,
					UNIQUE (
						`user` ,
						`email`
					)
					) ENGINE = INNODB;";
			mysql_query($makeUsers) or die(mysql_error());
			echo 'Created table users<br />';
			$makeStandardAdmin = "INSERT INTO users (user,password,firstname,lastname,email,isAdmin) VALUES ('admin','".md5("admin")."','Admin','Admin','admin',1);";
			mysql_query($makeStandardAdmin) or die(mysql_error());
                
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
					`foraID` INT( 10 ) NOT NULL ,
					`userID` INT( 10 ) NOT NULL ,
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
		$checkArticles = "SELECT * FROM articles;";
		$result = mysql_query($checkArticles);
		echo 'Checking table articles<br />';
		if(!$result) {
			echo 'Creating table articles.<br />';
			$makeArticles = "	CREATE TABLE  `miForum`.`articles` (
					`articleID` INT( 10 ) NOT NULL AUTO_INCREMENT ,
					`title` VARCHAR( 30 ) NOT NULL ,
					`text` LONGTEXT NOT NULL ,
					`writerID` INT( 10 ) NOT NULL ,
					INDEX (  `articleID` )
					) ENGINE = INNODB;";
			mysql_query($makeArticles) or die(mysql_error());
			echo 'Created table articles<br />';
                
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

		// Relations
		$alterFora = "ALTER TABLE  `fora` ADD INDEX (  `categoryID` )";
		$makeRelationForaCat = "ALTER TABLE  `fora` ADD FOREIGN KEY (  `categoryID` ) REFERENCES  `miForum`.`categories` (
						`categoryID`
						) ON DELETE CASCADE ON UPDATE CASCADE ;";
		mysql_query($alterFora) or die(mysql_error());
		mysql_query($makeRelationForaCat) or die(mysql_error());

		$alterThreads = "ALTER TABLE  `threads` ADD INDEX (  `foraID` )";
		$makeRelationThreadsFora = "ALTER TABLE  `threads` ADD FOREIGN KEY (  `foraID` ) REFERENCES  `miForum`.`fora` (
						`foraID`
						) ON DELETE CASCADE ON UPDATE CASCADE ;";
		mysql_query($alterThreads) or die(mysql_error());
		mysql_query($makeRelationThreadsFora) or die(mysql_error());

		$alterPost = "ALTER TABLE  `post` ADD INDEX (  `threadID` )";
		$makeRelationPostThreads = "ALTER TABLE  `post` ADD FOREIGN KEY (  `threadID` ) REFERENCES  `miForum`.`threads` (
						`threadID`
						) ON DELETE CASCADE ON UPDATE CASCADE ;";
		mysql_query($alterThreads) or die(mysql_error());
		mysql_query($makeRelationPostThreads) or die(mysql_error());
	}
?>

<a href="index.php">Return to Index page</a>
