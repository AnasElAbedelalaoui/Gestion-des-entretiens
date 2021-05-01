<h1> Ajouter une plage horraire dans le planning des entretiens</h1>
<link rel="stylesheet" href ="fichier.css"></style>
<?php
	/*Connexion à la base de données sur le serveur tp-epua*/

	$conn = @mysqli_connect("tp-epu:3308", "abdoumaz","tfmgvf34");    



	if (mysqli_connect_errno()) {

		$msg = "erreur ". mysqli_connect_error();

	} else {  

		$msg = "connecté au serveur " . mysqli_get_host_info($conn);

		/*Sélection de la base de données*/

		mysqli_select_db($conn, "abdoumaz"); 

		/*mysqli_select_db($conn, "etu"); */ /*sélection de la base sous la VM info642*/



		/*Encodage UTF8 pour les échanges avecla BD*/

		mysqli_query($conn, "SET NAMES UTF8");

	}

	if (isset($_POST["button"]) and (!empty($_POST["Identifiant"])) and (!empty($_POST["date"])) and (!empty($_POST["startime"]))){
		$sql ="INSERT INTO Horaire(idH, dates, horraire) VALUES ('{$_POST["Identifiant"]}', '{$_POST["date"]}', '{$_POST["startime"]}')";
		$result = mysqli_query($conn, $sql);
		if($result == 1){
			echo "<div id='affichage'>L'Horraire a bien été ajouté</div>";
		}
	}
?>
<div id="id2"><?php include 'administrateur.php'; ?></div>
<div id="id3">
<body>
<form action="" method="post">
 	<p>Identifiant: <input type="text" name="Identifiant" placeholder="Saisir l'identifiant de la plage" /></p>
 	<p>Date : <input type="datetime" name="date" placeholder="date au format Y-m-d"/></p>
 	<p>Horaire : <input type="timezone" name="startime" placeholder=" Saisir une heure du debut"/></p>
 	<p><button type="submit" name="button">Ajouter l'Horraire</button></p>
</form>
<button type="button" onclick="window.location.href='administrateur.php'">Retour</button>
</body>
</div>
 
