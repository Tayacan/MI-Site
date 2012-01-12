$getAuthor = "SELECT firstname, lastname FROM users WHERE userID = '".$row['writerID']."';";
$writerResult = mysql_query($getAuthor) or die(mysql_error());

// Get name of author
while($writer = mysql_fetch_array($writerResult)) {
        $authorName = $writer['firstname'] . ' ' . $writer['lastname'];
}

// Pretty printing of the article
echo '<h2>'.$row['title'].'</h2>';
echo '<i>af '.$authorName.'</i><br /><br />';
echo '<script type="text/javascript" src="google-code-prettify/src/prettify.js"></script>';
echo '<script type="text/javascript" src="text_edit.js"></script>';
echo '<script type="text/javascript">';
echo 'window.onload = function () {prettyPrint(); };';
echo 'var textToWrite = "'.mysql_real_escape_string($row['text']).'";';
echo 'textToWrite = view_text(textToWrite);';
echo 'document.write(textToWrite);';
echo '</script>';

// Check if user can edit and delete
if(isset($_SESSION['LoggedIn'])) {
        $isAdmQuery = "SELECT isAdmin FROM users WHERE userID = ".$_SESSION['LoggedIn'].";";
        $isAdm = mysql_query($isAdmQuery) or die(mysql_error());
        $admRow = mysql_fetch_array($isAdm);
        if($_SESSION['LoggedIn'] == $row['writerID'] || $admRow['isAdmin'] == 1) {
                echo "<br /><br /><span style='float: right;'><a href='editArticle.php?id=".$row['articleID']."'>Rediger</a> 
                <a href='deleteArticle.php?id=".$row['articleID']."'>Slet</a></span><br />";
        }
}
