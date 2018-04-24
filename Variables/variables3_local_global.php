<?php
$x = 5; // global scope

function myTest() {
    // using x inside this function will generate an error
	 global $x;
    echo "<p>Variable x inside function is: $x</p>";
	$x = 6; 
	 echo "<p>Variable x inside function is: $x</p>";
} 
myTest();

echo "<p>Variable x outside function is: $x</p>";
?>