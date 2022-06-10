

<?php
   #php foundtions 
//--------------------------------------------------------------------------

   /*
    1  abs -------- Absolute value;
   Description ---- abs(int | float $num): int |float; returns the absolute value of num.

   parameters ----- The numeric value to process

   */
#Example
echo " working with abs() function in php";
    echo abs(-4.2)."<br>";
    $n2 = 2;
    $n3 = 3;
    echo $n2 - $n3." the answer to 2 - 3 <br>";
    echo abs($n2 - $n3)." the absolute value of -1 (abs()) <br><br>";
# Response
/*
    working with abs() function in php4.2
    -1 the answer to 2 - 3
    1 the absolute value of -1 (abs())
*/
/*
    2 bin2hex ----- convert binary data into hexadecimal representation.
    Description -----bin2hex(string $string): string
    Parameters ------ string A sting
*/
$hex = bin2hex('abcdefghijklmnopqrstuvwxyz');

echo$hex."<br>";
echo hex2bin($hex)."<br>";

?>