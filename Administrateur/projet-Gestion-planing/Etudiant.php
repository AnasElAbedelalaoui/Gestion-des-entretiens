<h1> Inscrire un etudiant</h1>
<link rel="stylesheet" href ="fichier.css"></style>
<?php
	
	/*Connexion à la base de données sur le serveur tp-epua*/

	$conn = @mysqli_connect("tp-epu:3308", "abdoumaz","tfmgvf34");    

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

	if (isset($_POST["button"]) and (!empty($_POST["Identifiant"])) and (!empty($_POST["Nom"])) and (!empty($_POST["Prenom"])) and (!empty($_POST["Photo"]))and (!empty($_POST["Email"]))and (!empty($_POST["Telephone"]))and (!empty($_POST["NumRue"]))and (!empty($_POST["NomRue"]))and (!empty($_POST["codeposte"]))and (!empty($_POST["ville"]))){
		$sql ="INSERT INTO Etudiant (idEtu, nomEtu, prenomEtu,photoEtu,emailEtu,telEtu,noAdrEtu,rueAdrETu,cpAdrEtu,villeETu) VALUES ('{$_POST["Identifiant"]}', '{$_POST["Nom"]}', '{$_POST["Prenom"]}','{$_POST["Photo"]}','{$_POST["Email"]}','{$_POST["Telephone"]}','{$_POST["NumRue"]}','{$_POST["NomRue"]}','{$_POST["codeposte"]}','{$_POST["ville"]}')";
		$result = mysqli_query($conn, $sql);
		if($result == 1){
			echo "<div id='affichage'>L'etudiant a bien été ajouté</div>";
		}

	}
?>
<div id="id2"><?php include 'administrateur.php'; ?></div>
<div id="id3">
<body>
<form action="" method="post">
 	<p>Identifiant: <input type="text" name="Identifiant" placeholder="Saisir le numero du dossier" /></p>
 	<p>Nom : <input type="text" name="Nom" placeholder="Saisir Nom de l'etudiant"/></p>
 	<p>Prenom : <input type="text" name="Prenom" placeholder=" Saisir Prenom de l'etudiant"/></p>
 	<p>Photo : <input type="file" name="Photo" size=50/></p>
 	<p>Adresse Electronique : <input type="text" name="Email" placeholder=" Saisir l'email de l'etudiant"/></p>
 	<p>Telephone : <input type="text" name="Telephone" placeholder=" Saisir le telephone de l'etudiant"/></p>
 	<p>Numero de Rue : <input type="text" name="NumRue" placeholder=" Saisir le numero de l'adresse  de l'etudiant"/></p>
 	<p>Nom de Rue : <input type="text" name="NomRue" placeholder=" Saisir le nom de l'adresse  de l'etudiant"/></p>
 	<p>Code Postale : <input type="text" name="codeposte" placeholder=" Saisir le code postale de l'etudiant"/></p>
 	<p>Ville de L'Etudiant : <input type="text" name="ville" placeholder=" Saisir la ville  de l'etudiant"/></p>
 	<p><button type="submit" name="button">Ajouter l'Etudiant</button></p>
</form>
<button type="button" onclick="window.location.href='administrateur.php'">Retour</button>
</body>
</div>
 
