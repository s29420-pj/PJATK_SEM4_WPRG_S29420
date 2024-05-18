<?php
session_start();

$login = "root";
$password = "root";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['username'] == $login && $_POST['password'] == $password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $_POST['username'];
        header("Location: reservation.php");
        exit();
    } else {
        $error = "Invalid login credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Reservation Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Login</h1>
<?php if (isset($error)) echo "<p>$error</p>"; ?>
<form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Login</button>
</form>
</body>
</html>