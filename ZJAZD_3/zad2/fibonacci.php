<?php

function factorialRecursive($n)
{
    if ($n == 0) {
        return 1;
    } else {
        return $n * factorialRecursive($n - 1);
    }
}

function factorialNonRecursive($n)
{
    $factorial = 1;

    for ($i = 1; $i <= $n; $i++) {
        $factorial *= $i;
    }

    return $factorial;
}

function fibonacciRecursive($n)
{
    if ($n <= 1) {
        return $n;
    } else {
        return fibonacciRecursive($n - 1) + fibonacciRecursive($n - 2);
    }
}

function fibonacciNonRecursive($n)
{
    $a = 0;
    $b = 1;

    for ($i = 0; $i < $n; $i++) {
        $temp = $a;
        $a = $b;
        $b = $temp + $b;
    }
    return $a;
}

$n = $_GET['argument'];

$start = microtime(true);
factorialRecursive($n);
$end = microtime(true);
$timeRecursiveFactorial = $end - $start;

$start = microtime(true);
factorialNonRecursive($n);
$end = microtime(true);
$timeNonRecursiveFactorial = $end - $start;

$start = microtime(true);
fibonacciRecursive($n);
$end = microtime(true);
$timeRecursiveFibonacci = $end - $start;

$start = microtime(true);
fibonacciNonRecursive($n);
$end = microtime(true);
$timeNonRecursiveFibonacci = $end - $start;

echo "Recursive factorial time: $timeRecursiveFactorial. <br>";
echo "Non-recursive factorial time: $timeNonRecursiveFactorial. <br>";
echo "Recursive Fibonacci time: $timeRecursiveFibonacci. <br>";
echo "Non-recursive Fibonacci time: $timeNonRecursiveFibonacci. <br><br>";
echo "The number is: $n. <br><br>";
echo "The factorial of the number is: " . factorialRecursive($n) . ". <br>";
echo "The Fibonacci number is: " . fibonacciRecursive($n) . ". <br>";
echo "The non-recursive factorial of the number is: " . factorialNonRecursive($n) . ". <br>";
echo "The non-recursive Fibonacci number is: " . fibonacciNonRecursive($n) . ". <br>";
echo "The time of execution of the script is: " . (microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]) . " seconds. <br>";
echo "The time of execution of the script is: " . (microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]) * 1000 . " milliseconds. <br>";
