<h1> Ajouter Une salle dans le planning des entretiens</h1>
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

	if (isset($_POST["button"]) and (!empty($_POST["Identifiant"]))){
		$sql ="INSERT INTO Salle (idsal)VALUES ('{$_POST["Identifiant"]}')";
		$result = mysqli_query($conn, $sql);
		if($result == 1){
			echo "<div id='affichage'>La salle a bien été ajouté</div>";
		}
	}
?>
<div id="id2"><?php include 'administrateur.php'; ?></div>
<div id="id3">
<body>
<form action="" method="post">
 	<p>Identifiant: <input type="text" name="Identifiant" placeholder="Saisir le numero de la salle" /></p>
 	<p><button type="submit" name="button">Ajouter la salle </button></p>
</form>
<button type="button" onclick="window.location.href='administrateur.php'">Retour</button>
</body>
</div> 
