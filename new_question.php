<link rel="stylesheet" href="style.css">

<style>
br { margin: 16px; }
</style>
<form action="" method="GET">
	<input type="text" name="pregunta" placeholder="Pregunta...">
	<br>
	<input type="radio" name="correcta" value="1">
	<input type="text" name="resposta1" placeholder="Resposta 1...">
	<br>
	<input type="radio" name="correcta" value="2">
	<input type="text" name="resposta2" placeholder="Resposta 2...">
	<br>
	<input type="radio" name="correcta" value="3">
	<input type="text" name="resposta3" placeholder="Resposta 3...">
	<br>
	<input type="radio" name="correcta" value="4">
	<input type="text" name="resposta4" placeholder="Resposta 4...">
	<br>
	<input type="submit" value="Crear pregunta">
</form>

<?php

if(isset($_GET['pregunta'])){
	$mysqli = new mysqli("localhost", "my_lmsuser", "my_lmspassword", "my_lmsdb");

	$stmt = $mysqli->prepare("INSERT INTO questions (q, a1, a2, a3, a4, correct) VALUES (?,?,?,?,?,?)");

	$stmt->bind_param("sssssi", $pregunta, $resposta1, $resposta2, $resposta3, $resposta4, $correcta);

	$pregunta = $_GET['pregunta'];
	$resposta1 = $_GET['resposta1'];
	$resposta2 = $_GET['resposta2'];
	$resposta3 = $_GET['resposta3'];
	$resposta4 = $_GET['resposta4'];
	$correcta = $_GET['correcta'];

	$stmt->execute();

	$stmt->close();

	echo "<h3>Pregunta creada!</h3>";
}
?>
<form action="index.php">
<input type="submit" value="Inicia el qüestionari">
</form>

