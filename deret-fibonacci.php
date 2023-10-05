<?php

function fibonacci($n) {
    if ($n <= 0) {
        return 1;
    } elseif ($n == 1) {
        return 1;
    } else {
        return (fibonacci($n - 1) + fibonacci($n - 2));
    }
}

// Example usage:
$number = 10; // Change this to the desired Fibonacci number
for ($i = 0; $i < $number; $i++) {
    echo fibonacci($i) . " ";
}