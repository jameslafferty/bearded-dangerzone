<pre><?php
// "Associative" array
$animals = array(
	"fox" => "Tod",
	"dog" => "Copper"
);
foreach ($animals as $species => $name) {
	echo "$species: $name<br />";
}
// "Indexed" array
$cats = array(
	"Echo",
	"Whisper"
);
echo "Here is a list of my cats: <ul>";
foreach ($cats as $cuteyKitty) {
	echo "<li>$cuteyKitty is a cutey kitty</li>";
}
echo "</ul>";
for ($i = 0; $i < count($cats); $i += 1) {
	echo "{$cats[$i]} and&hellip;<br />";
}
echo "<ul><li>" . implode("</li><li>", $cats) . "</li></ul>";
echo $cats[1] . "<br />";
$animals["cats"] = &$cats;
echo $animals["cats"][0] . "<br />"; // Refers to "Echo" in the animals array.
echo "<ul>";
foreach ($animals as $species => $members) {
	echo "<li>";
	if (is_array($members)) {
		echo "<ul>";
		foreach ($members as $aMember) {
			echo "<li>$aMember</li>";
		}
		echo "</ul></li>";
	} else {
		echo "$members</li>";
	}
}
echo "</ul>";
$animals["cats"][0] = "Tigger";
print_r($animals);
echo $cats[0];
?></pre>






