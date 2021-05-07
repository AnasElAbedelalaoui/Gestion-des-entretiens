<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="deco.css">
</head>

<body>
	<div id="contenu">
		<form action="page_acceuil.php" method="get">
			<h1>Deconnexion</h1>
			<p>Voulez-vous vraiment partir?</p>
			<button type="submit" name="confirmer" value=1>Confimer</button>
			<a href="administrateur.php">Annuler</a>
			<?php
			if (isset($_GET["confirmer"])){
				//Réinitialise le tableau de session avec les valeurs originales
				session_unset();
			}	
			?>
		</form>
	</div>
</body>
</html>