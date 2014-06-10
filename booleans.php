<?php

if (true || false) { // if (true OR false)
	 echo "true<br />";
}
if (true && false) { // if (true AND false)
	echo "true";
}
if (false) {
	echo "false";
}
if ("0" == 0) {
	echo "0 equals 0<br />";
}
if (1 != 2) {
	echo "1 does not equal 2<br />";
}
if ("0" === 0) {
	echo "'0' equals 0<br />";
} elseif (false) {
	echo "'0' does not equal 0<br />";
} else {
	echo "'0' does not equal 0 and false is false.<br />";
}
if ("1" !== 1) {
	echo "'1' does not equal 1<br />";
}
//Ternary operator
echo true ? "True is true<br />" : "True is false<br />";
echo false ? "False is true<br />" : "False is false<br />";



