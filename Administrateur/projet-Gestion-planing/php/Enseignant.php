
<html>
<link rel="stylesheet" href ="fichier.css"></style>
<h1> Ajouter Un enseignant dans le planning</h1>

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
	if (isset($_POST["button"]) and (!empty($_POST["Identifiant"])) and (!empty($_POST["Nom"])) and (!empty($_POST["Prenom"])) and (!empty($_POST["Email"]))and (!empty($_POST["Telephone"]))){
		$sql ="INSERT INTO Enseignant (idEns, nomEns, prenomEns,emailEns,telEns) VALUES ('{$_POST["Identifiant"]}', '{$_POST["Nom"]}', '{$_POST["Prenom"]}','{$_POST["Email"]}','{$_POST["Telephone"]}')";
		$result = mysqli_query($conn, $sql);
		if($result == 1){
			echo "<div id='affichage'>L'enseignant a bien été ajouté</div>";
		}
	}
?>
<div id="id2"><?php include 'administrateur.php'; ?></div>
<div id="id3">
<body>
<form action="" method="post">
 	<p>Identifiant: <input type="text" name="Identifiant" placeholder="Saisir le numero l'identifiant" /></p>
 	<p>Nom : <input type="text" name="Nom" placeholder="Saisir Nom de l'enseignant"/></p>
 	<p>Prenom : <input type="text" name="Prenom" placeholder=" Saisir Prenom de l'enseignant"/></p>
 	<p>Adresse Electronique : <input type="text" name="Email" placeholder=" Saisir l'email de l'enseignant"/></p>
 	<p>Telephone : <input type="text" name="Telephone" placeholder=" Saisir le telephone de l'enseignant"/></p>
 	<p><button type="submit" name="button">Ajouter l'Enseignant</button></p>
</form>
<button type="button" onclick="window.location.href='administrateur.php'">Retour</button>
</body>
</div>
</html>
