<?php
	require_once('connect.php');
	require_once('util.php');

	session_start();
	if(!isset($_SESSION['LoggedIn']) || !isset($_GET['id'])) {
		header('Location: articles.php');
		exit;
	}

	$artID = mysql_real_escape_string($_GET['id']);

        $checkUser = "SELECT * FROM articles WHERE articleID=".$artID.";";
        $res = mysql_query($checkUser) or die(mysql_error());

        // Obstacle number two - are you the author?
        while($row = mysql_fetch_array($res)) {
		$isAdmQuery = "SELECT isAdmin FROM users WHERE userID = ".$_SESSION['LoggedIn'].";";
                $isAdm = mysql_query($isAdmQuery) or die(mysql_error());
                $admRow = mysql_fetch_array($isAdm);

                if($row['writerID'] !== $_SESSION['LoggedIn'] && $admRow['isAdmin'] != 1) {
                        header('Location: articles.php');
                        exit;
                }
        }
	top();

	$deleteQuery = "DELETE FROM articles WHERE articleID=".$artID.";";
	if(mysql_query($deleteQuery) or die(mysql_error())) {
		echo "Artiklen er slettet. <a href='articles.php'>Tilbage til artikeloversigten</a>";
	}

	bottom();
?>
