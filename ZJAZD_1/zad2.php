<?php
$start = 2; // start of the range
$end = 100; // end of the range

for ($i = $start; $i <= $end; $i++) {
    $isPrime = true;
    for ($j = 2; $j * $j <= $i; $j++) {
        if ($i % $j == 0) {
            $isPrime = false;
            break;
        }
    }
    if ($isPrime) {
        echo $i . "\n";
    }
}