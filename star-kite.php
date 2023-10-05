<?php

function generateStarKite($size) {
    // Upper part of the kite
    for ($i = 1; $i <= $size; $i++) {
        // Print spaces before stars
        for ($j = 1; $j <= $size - $i; $j++) {
            echo " ";
        }
        
        // Print stars
        for ($k = 1; $k <= 2 * $i - 1; $k++) {
            echo "*";
        }
        
        // Move to the next line
        echo PHP_EOL;
    }
    
    // Lower part of the kite
    for ($i = $size - 1; $i >= 1; $i--) {
        // Print spaces before stars
        for ($j = 1; $j <= $size - $i; $j++) {
            echo " ";
        }
        
        // Print stars
        for ($k = 1; $k <= 2 * $i - 1; $k++) {
            echo "*";
        }
        
        // Move to the next line
        echo PHP_EOL;
    }
}

// Example usage:
$size = 3; // Change this to the desired size of the star kite
generateStarKite($size);