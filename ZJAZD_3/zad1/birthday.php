<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getDayOfWeek($date) {
    return date('l', strtotime($date));
}

function getAge($date) {
    $dob = new DateTime($date);
    $now = new DateTime();
    $diff = $now->diff($dob);
    return $diff->y;
}

function getDaysUntilNextBirthday($date) {
    $dob = new DateTime($date);
    $now = new DateTime();
    $nextBirthdayYear = $now->format('Y');
    if ($dob->format('m-d') < $now->format('m-d')) {
        $nextBirthdayYear++;
    }
    $nextBirthday = new DateTime($nextBirthdayYear . '-' . $dob->format('m-d')); // Changed the order to 'YYYY-MM-DD'
    return $now->diff($nextBirthday)->days;
}

if (isset($_GET['birthdate'])) {
    $date = $_GET['birthdate'];
    $dayOfWeek = getDayOfWeek($date);
    $age = getAge($date);
    $daysUntilNextBirthday = getDaysUntilNextBirthday($date);

    echo "Day of the week: $dayOfWeek<br>";
    echo "Age: $age<br>";
    echo "Days until next birthday: $daysUntilNextBirthday<br>";
}
