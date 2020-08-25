<?php
include 'header.php';

$mysqli = new mysqli("localhost", "my_lmsuser", "my_lmspassword", "my_lmsdb");

$resultat = $mysqli->query("SELECT * FROM questions");

echo "<form action='review.php' method='GET'>";

while ($fila = $resultat->fetch_assoc()) {
	$id = $fila['id'];
	$pregunta = $fila['q'];

	echo "<div class='question'>";
	echo "<p>$pregunta</p>\n";
	for ($i=1; $i<=4; $i++) {
		echo "<div class='answer'><input type='radio' id='$id$i' name='$id' value='$i'><label for='$id$i'>" . $fila["a$i"] . "</label></div>";
	}
	echo "</div>";
}

echo "<input type='submit' value=\"Acaba l'intent...\">";
echo "</form>";
?>