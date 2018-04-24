<?php
function myTest() {
    static $x = 0;
    echo $x."\n";
    $x++;
}

myTest();
myTest();
myTest();
?>