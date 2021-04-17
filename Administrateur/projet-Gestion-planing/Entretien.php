<h1> Ajouter un entretien dans la liste des entretiens</h1>
<link rel="stylesheet" href ="fichier.css"></style>
<?php

	/*Connexion à la base de données sur le serveur tp-epua*/

	$conn = @mysqli_connect("tp-epu:3308", "abdoumaz", "tfmgvf34");    

	/*connexion à la base de donnée depuis la machine virtuelle INFO642*/

	/*$conn = @mysqli_connect("localhost", "etu", "bdtw2021");*/  



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
	if (isset($_POST["button"]) and (!empty($_POST["Identifiant"])) and (!empty($_POST["idsalle"]))  and (!empty($_POST["idH"])) and (!empty($_POST["type"]))){
		$sql ="INSERT INTO Entretien (idEn,type,idH,idsal) VALUES ('{$_POST["Identifiant"]}', '{$_POST["type"]}', '{$_POST["idsalle"]}','{$_POST["idH"]}')";
		$result = mysqli_query($conn, $sql);
		if($result == 1){
			echo "<div id='affichage'>L'entretien a bien été ajouté</div>";
		}
	}
?>
<div id="id2"><?php include 'administrateur.php'; ?></div>
<div id="id3">
<body>
<form action="" method="post">
 	<p>Identifiant: <input type="text" name="Identifiant" placeholder="Saisir l'identifiant de la salle" /></p>
	<p>TYPE: <input type="text" name="type" placeholder="PEIP ou ING" /></p>
	<p>ID-Salle: <input type="text" name="idsalle" placeholder="Saisir l'identifiant de la salle" /></p>
	<p>ID-Horaire: <input type="text" name="idH" placeholder="Saisir l'identifiant de l'horaire" /></p>
 	<p><button type="submit" name="button">Ajouter Entretien </button></p>
</form>
<button type="button" onclick="window.location.href='administrateur.php'">Retour</button>
</body>
</div>
