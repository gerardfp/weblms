<?php
include 'header.php';

$mysqli = new mysqli("localhost", "my_lmsuser", "my_lmspassword", "my_lmsdb");

$resultat = $mysqli->query("SELECT * FROM questions");

$punts = 0;
$total = 0;

while ($fila = $resultat->fetch_assoc()) {
	$total++;

	$id = $fila['id'];
	$pregunta = $fila['q'];
	echo "<div class='question'>";
	echo "<p>$pregunta</p>";

	for($i=1; $i<=4; $i++){
		if($_GET[$id] == $i){
			$marcada = "checked";
                	if($_GET[$id] == $fila['correct']){
				$classe = "correct";
				$punts++;
                	} else {
				$classe = "incorrect";
                	}
        	} else {
			$marcada = "";
			if($fila['correct'] == $i){
				$classe = "valid";
			}else {
				$classe = "";
			}
        	}
		echo "<div class='answer $classe'><input type='radio' id='answer$i' $marcada disabled><label for='answer$i'>" . $fila["a$i"] . "</label></div>";
	}

	if($_GET[$id] == $fila['correct']){
		echo "<br>+1!";
	}
	echo "</div>";

}
echo "<h3>Puntuació: $punts / $total (". number_format($punts/$total*100, 2) ."%)</h3>";
?>

<a href="index.php">Torna a intentar-ho</a>
