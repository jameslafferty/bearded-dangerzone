<?php
// Function names in PHP are not case sensitive
echo isset($foo) ? "true\n" : "false\n"; // returns false
echo ISSET($foo) ? "true\n" : "false\n"; // also returns false
function myGreeter ($name = "world", $salutation = "Hello") {
	//global $greeting; //Try not to declare function variables as global
	$greeting = "$salutation, $name\n";
	return $greeting;
}
echo myGreeter("James", "Greetings");
$worldGreeting = myGreeter();
echo "The world greeting is: $worldGreeting";
//echo $greeting;
// No overloading in PHP. The following throws a fatal error:
//function myGreeter ($name, $salutation = "Hello") {
//	return "$salutation, $name\n";
//}
$curry = function ($func, $x) {
	return function ($y) use ($func, $x) {
		return $func($x, $y);
	};
};
$add = function ($a, $b) {
	return $a + $b;
};
$add1 = $curry($add, 1);
echo $add1(2) . "\n";
echo $add1(3) . "\n";







