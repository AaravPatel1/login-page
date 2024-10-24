<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $file = fopen("users.txt", "r");
    $valid_user = false;

    while (($line = fgets($file)) !== false) {
        list($stored_user, $stored_pass) = explode(":", trim($line));
        if ($username == $stored_user && password_verify($password, $stored_pass)) {
            $valid_user = true;
            break;
        }
    }
    fclose($file);

    if ($valid_user) {
        header("Location: welcome.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>
