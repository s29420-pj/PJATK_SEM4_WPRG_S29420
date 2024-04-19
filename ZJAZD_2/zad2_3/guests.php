<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['guests'] = $_POST;
    header("Location: reservationSummary.php");
} else {
    $osoby = $_GET['guests'];
    echo '<form action="" method="post">';
    for ($i = 1; $i <= $osoby; $i++) {
        echo "Guest $i:<br>";
        echo 'Name: <input type="text" name="guest' . $i . '_name" required><br>';
        echo 'Surname: <input type="text" name="guest' . $i . '_surname" required><br>';
    }
    echo '<input type="submit" value="Submit">';
    echo '</form>';
}