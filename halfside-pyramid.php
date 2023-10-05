<?php

function generateHalfSideStarPyramid($rows) {
    for ($i = 1; $i <= $rows; $i++) {
        // Add stars
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }

        // Move to the next line
        echo PHP_EOL;
    }
}

// Example usage:
$numberOfRows = 5; // Change this to the desired number of rows
generateHalfSideStarPyramid($numberOfRows);