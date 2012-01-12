if(!empty($_GET['error'])) {
        if($_GET['error'] == 1){
                echo "<span style='color:red;'>Please fill out all fields.</span><br /><br />";
        } else if($_GET['error'] == 2) {
                echo "<span style='color:red;'>Password doesn't match - did you mistype?</span><br /><br />";
        } else if ($_GET['error'] == 3) {
                echo "<span style='color:red;'>Username already exists :(</span><br /><br />";
        }
}

