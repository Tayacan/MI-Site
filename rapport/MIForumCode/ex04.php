$admincheck = 'SELECT isAdmin FROM users WHERE userID = "'.@$_SESSION['LoggedIn'].'";';
$isadmin = mysql_query($admincheck) or die(mysql_error());
while($row = mysql_fetch_array($isadmin)){
        if($row['isAdmin']==1){
                // Do stuff
        } else {
                // Do other stuff
        }
}
