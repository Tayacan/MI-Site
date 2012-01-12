if($_POST['password1'] != $_POST['password2']) {
        header('Location: register.php?error=2');
        exit;
}
