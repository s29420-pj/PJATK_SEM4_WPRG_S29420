<?php

function fibonacci($n) {
    $fib = array(0, 1);
    for ($i = 2; $i <= $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }
    return $fib;
}

$n = 10; // przykład
$fibonacciNumbers = fibonacci($n);

$lineNumber = 1;
foreach ($fibonacciNumbers as $number) {
    if ($number % 2 != 0) {
        echo $lineNumber . ": " . $number . "\n";
        $lineNumber++;
    }
}