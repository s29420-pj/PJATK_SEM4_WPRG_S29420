<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['data'] = $_POST;
    $guests = $_POST['guests'];
    header("Location: guests.php?guests=$guests");
}