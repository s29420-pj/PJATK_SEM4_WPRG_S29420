<?php

function isPrime($n) {
    if ($n <= 1) {
        return false;
    }
    if ($n == 2) {
        return true;
    }
    if ($n % 2 == 0) {
        return false;
    }
    $sqrt = sqrt($n);
    for ($i = 3; $i <= $sqrt; $i += 2) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    if (filter_var($number, FILTER_VALIDATE_INT) === false || $number <= 0) {
        echo "The entered value is not a positive integer.";
    } else {
        if (isPrime($number)) {
            echo "Number $number is prime.";
        } else {
            echo "Number $number is not prime.";
        }
    }
}