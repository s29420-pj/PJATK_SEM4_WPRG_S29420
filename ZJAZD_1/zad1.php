<?php

$fruits = ["jabłko", "banan", "pomarańcza"];

foreach ($fruits as $fruit) {
    $reversedFruit = "";
    for ($i = strlen($fruit) - 1; $i >= 0; $i--) {
        $reversedFruit .= $fruit[$i];
    }
    echo $reversedFruit . "\n";

    if ($fruit[0] == "p") {
        echo "This fruit starts with the letter 'p'.\n";
    }
}
