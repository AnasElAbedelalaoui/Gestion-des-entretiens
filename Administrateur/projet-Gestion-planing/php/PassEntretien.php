
<html>
<link rel="stylesheet" href ="fichier.css"></style>
<h1> Affecter Un Etudiant à un Entretien</h1>

<?php

	/*Connexion à la base de données sur le serveur tp-epua*/

	$conn = @mysqli_connect("tp-epu:3308", "abdoumaz", "tfmgvf34");    




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
	if (isset($_POST["button"]) and (!empty($_POST["Identifiant-EN"])) and (!empty($_POST["Identifiant-ETU"]))){
		$sql ="INSERT INTO PasseEntretien (idEn, idEtu) VALUES ('{$_POST["Identifiant-EN"]}', '{$_POST["Identifiant-ETU"]}')";
		$result = mysqli_query($conn, $sql);
		if($result == 1){
			echo "<div id='affichage'>L'Etudiant a bien été affecté</div>";
		}
	}
?>

<div id="id2"><?php include 'administrateur.php'; ?></div>
<div id="id3">
<body>
<form action="" method="post">
 	<p>Id-Entretien: <input type="text" name="Identifiant-EN" placeholder="Saisir le numero l'identifiant" /></p>
 	<p>Id-Etudiant: <input type="text" name="Identifiant-ETU" placeholder="Saisir Nom de l'enseignant"/></p>
 
 	<p><button type="submit" name="button">Affecter l'etudiant à l'entretien</button></p>
</form>
<button type="button" onclick="window.location.href='administrateur.php'">Retour</button>
</body>
</div>
</html>
