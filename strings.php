<pre><?php

echo "\nThe quick brown\n\t\tfox jumped\nover the\nlazy dog.\n";
echo '\nThe quick brown\n\t\tfox jumped\nover the\nlazy dog.\n';
$fox = "Tod";
$dog = "Copper";
echo "\nThe quick brown\n\t\t$fox jumped\nover the\nlazy $dog.\n";
echo '\nThe quick brown\n\t\t$fox jumped\nover the\nlazy $dog.\n';
$animals = array(
	"fox" => "Tod",
	"dog" => "Copper"
);
echo "\nThe quick brown\n\t\t{$animals['fox']} jumped\nover the\nlazy {$animals['dog']}.\n";
$animals = (object) $animals;
echo "\nThe quick brown\n\t\t$animals->fox jumped\nover the\nlazy $animals->dog.\n";
?></pre>