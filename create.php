<?php
try{
	
	$conn = new PDO('mysql:host=localhost;dbname=randonnée;charset=utf8', 'root');
}
catch(Exception $e)
{
    
    die('Erreur : '.$e->getMessage());
}
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="/php-pdo/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Ajouter</button>
	</form>

    <?php
	//Récupération des infos
	$name = isset($_POST['name']) ? $_POST['name'] : NULL;
	$difficulty = isset($_POST['difficulty']) ? $_POST['difficulty'] : NULL;
	$distance = isset($_POST['distance']) ? $_POST['distance'] : NULL;
	$duration = isset($_POST['duration']) ? $_POST['duration'] : NULL;
	$height_difference = isset($_POST['height_difference']) ? $_POST['height_difference'] : NULL;


	try {
		//requête préparée
		$add_city = $conn->prepare("INSERT INTO hiking(name, difficulty, distance, duration, height_difference) VALUES (:name, :difficulty, :distance, :duration, :height_difference)");

		$add_city->execute([
			'name' => $name,
			'difficulty' => $difficulty,
			'distance' => $distance,
			'duration' => $duration,
			'height_difference' => $height_difference,
		]);

		echo " la randonnée a été ajoutée!";
	} catch (Exception $e) {
		echo "erreur! :(";
	}
	?>
	

</body>
</html>