<?php

function generateReversedStarKite($size) {
	// Top border
	for ($i = 1; $i <= $size*4 - 1; $i++){
		echo "*";
	}
    // Move to the next line
	echo PHP_EOL;
	
    // Upper part of the kite
    for ($i = 1; $i <= $size - 1; $i++) {
        // Print stars before space
        for ($j = 1; $j <= $size*2 - $i - 1; $j++) {
            echo "*";
        }
        
        // Print space
        for ($k = 1; $k <= 2 * $i + 1; $k++) {
            echo " ";
        }
        
        // Print stars after space
        for ($l = 1; $l <= $size*2 - $i - 1; $l++) {
            echo "*";
        }
        
        // Move to the next line
        echo PHP_EOL;
    }
    
	// Middle part of the kite
	for ($i = 1; $i <= $size*4 - 1; $i++){
		// Print stars for middle part
		if ($i < $size || $i > $size*3){
			echo "*";
		}
		
		// Print space for middle part
		elseif($i == $size || $i == $size*3){
			echo " ";
		}
		
		//Print dash for middle part
		else{
			echo "-";
		}
	}
    // Move to the next line
	echo PHP_EOL;
    
    // Lower part of the kite
    for ($i = $size - 1; $i >= 1; $i--) {
        // Print stars before space
        for ($j = 1; $j <= $size*2 - $i - 1; $j++) {
            echo "*";
        }
        
        // Print space
        for ($j = 1; $j <= 2 * $i + 1; $j++) {
            echo " ";
        }
        
        // Print stars after space
        for ($j = 1; $j <= $size*2 - $i - 1; $j++) {
            echo "*";
        }
        
        // Move to the next line
        echo PHP_EOL;
    }
    
	// Bottom border
	for ($i = 1; $i <= $size*4 - 1; $i++){
		echo "*";
	}
}

// Example usage:
$size = 5; // Change this to the desired size of the star kite
generateReversedStarKite($size);
