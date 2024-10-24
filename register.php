<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $file = fopen("users.txt", "a");
    fwrite($file, "$username:$password\n");
    fclose($file);

    header("Location: welcome.php");
    exit();
}
?>

