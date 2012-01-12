$get_articles = "SELECT * FROM `articles` ORDER BY articleID DESC";
$result = mysql_query($get_articles) or die(mysql_error());

while($row = mysql_fetch_array($result)) {
        echo "<h3><a href='viewArticle.php?id=".$row['articleID']."'>";
        echo $row["title"]."<br />" ;
        echo "</a></h3><br />";
}

