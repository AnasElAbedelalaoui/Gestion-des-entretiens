
<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
	<link rel="stylesheet" a href="style.css">
	<link rel="stylesheet" a href="formulaire.css">
</head>
<body>
	<div class="container">
	<img src="login.jpg"/>
		<form method="POST" action="bdconnect.php" action="test.php">
		<h1>Connexion</h1>
			<div class="form-input">
			<label><b>NOM</b></label>
				<input type="text" name="nom" placeholder="Mettre votre nom"/required>	
			</div>
			<div class="form-input">
			<label><b>PRENOM</b></label>
				<input type="text" name="prenom" placeholder="Mettre votre prenom"/required>
			</div>
			<input type="submit" name="valider" value="LOGIN" class="btn-login"/>
		</form>
	</div>
</body>
</html>
