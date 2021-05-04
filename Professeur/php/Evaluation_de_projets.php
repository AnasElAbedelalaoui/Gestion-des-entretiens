<!DOCTYPE html>
<html> 
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" media="screen and (min-width: 1660px)" href="style2.css">
		<link rel="stylesheet" media="screen and (max-width: 1659px)" href="style3.css">
		<title>Evaluation de projets</title>
	</head>
<?php   
        /*Connexion à la base de données sur le serveur tp-epua*/
		$conn = @mysqli_connect("tp-epua:3308", "richardn", "4d397gwj");    
		/*tp-epua:3308*/
		/*connexion à la base de donnée depuis la machine virtuelle INFO642*/
		/*$conn = @mysqli_connect("localhost", "etu", "bdtw2021");*/  

		if (mysqli_connect_errno()) {
            $msg = "erreur ". mysqli_connect_error();
        } else {  
            $msg = "connecté au serveur " . mysqli_get_host_info($conn);
            /*Sélection de la base de données*/
            mysqli_select_db($conn, "richardn"); 
            /*mysqli_select_db($conn, "etu"); */ /*sélection de la base sous la VM info642*/
		
            /*Encodage UTF8 pour les échanges avecla BD*/
            mysqli_query($conn, "SET NAMES UTF8");
        }
		
 ?> 
	<body>
		<div id="box">
			<div id = "en_tete">
				<ul id="element">
					<li>
						<a href="Enseignant.php" class="logo"><b Style="color:white;font-size:20px;">POLYTECH <span Style="color:#33FFBC;">ANNECY</span></b></a>
					</li>
				</ul>
			</div>  
		
		<div id = "corps">
			
				<div id="menu">
				<div id="sub_menu">
					<a id="list_sub_menu" href ="Enseignant.php" style="background-color: #48C9B0;text-align: center;">--Accueil--</a>
					
					<a id="list_sub_menu" href ="planning.php"><img src="calendar-removebg-preview.png" alt="calendar" style="width:35px;height:30px;vertical-align: middle;"> Mon planning</a>
					
					<label id="list_sub_menu" style="font-size:30px;">Grilles d'évaluation</label>
					
					<a id="list_sub_menu" href ="Evaluation_de_projets.php"><img src="th__1_-removebg-preview.png" alt="calendar" style="width:35px;height:30px;vertical-align: middle;">Evaluation de projets</a>
					
					<a id="list_sub_menu" href ="Evaluation_de_stages.php"><img src="th-removebg-preview.png" alt="stage" style="width:35px;height:30px;vertical-align: middle;">Evaluation de stages </a>
					
					<a id="list_sub_menu" href ="ntretien_de_recrutements.php"><img src="th__3_-removebg-preview.png" alt="calendar" style="width:35px;height:30px;vertical-align: middle;">Entretien de recrutements</a>
					
					<a id="list_sub_menu" href ="app.php"><img src="th__2_-removebg-preview.png" alt="calendar" style="width:35px;height:30px;vertical-align: middle;">Evaluations de compétences des étudiants dans le cadre des APP</a>
				</div>
				</div>
				<div id="information">
					<h1>Evaluation de projets</h1>
					<h2>Choisissez un etudiant: </h2>
					<form action="Evaluation_de_projets.php" method = 'post'>
					<select name='butselect'>
						<?php
							$sql = "select e.idEtu, e.nomEtu, e.prenomEtu, e.emailEtu, p.idEn
									from Etudiant e 
									join PasseEntretien p on p.idEtu = e.idEtu
									where (select typee from Entretien where idEn like p.idEn) like 'projet' and (select idEns from Surveillance where idEn like p.idEn) like ".$GLOBALS["_COOKIE"]["idEns"].";";
							$result = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
							$idEN = $result[0]["idEn"];
							for ($index = 0; $index<count($result); $index++){
								echo "<option value=".$result[$index]["idEtu"].">".$result[$index]["prenomEtu"]." ".$result[$index]["nomEtu"]."</option><br>";
							};		
						?>
					</select><br><br>
					
					<table>
						<tr>
							<th>Elément évalués</th>
							<th>Sans objet</th>
							<th>Insuffisant</th>
							<th>Moyen</th>
							<th>B</th>
							<th>TB</th> 
						</tr>
						<tr>
							<td>Contenu de l'exposé</td>
							<td><input type="checkbox" name="Sans objet"></td>
							<td><input type="checkbox" name="Insuffisant"></td>
							<td><input type="checkbox" name="Moyen"></td>
							<td><input type="checkbox" name="B"></td>
							<td><input type="checkbox" name="TB"></td>
						</tr>
						<tr>
							<td>Qualité des supports</td>
							<td><input type="checkbox" name="Sans objet"></td>
							<td><input type="checkbox" name="Insuffisant"></td>
							<td><input type="checkbox" name="Moyen"></td>
							<td><input type="checkbox" name="B"></td>
							<td><input type="checkbox" name="TB"></td>
						</tr>
						<tr>
							<td>Qualité de l'expression</td>
							<td><input type="checkbox" name="Sans objet"></td>
							<td><input type="checkbox" name="Insuffisant"></td>
							<td><input type="checkbox" name="Moyen"></td>
							<td><input type="checkbox" name="B"></td>
							<td><input type="checkbox" name="TB"></td>
						</tr>
						<tr>
							<td>Réponse aux questions</td>
							<td><input type="checkbox" name="Sans objet"></td>
							<td><input type="checkbox" name="Insuffisant"></td>
							<td><input type="checkbox" name="Moyen"></td>
							<td><input type="checkbox" name="B"></td>
							<td><input type="checkbox" name="TB"></td>
						</tr>
					</table><br>
					<br>
					
					
					
						<label>Note: <label><input type="text" name="note" pattern="[[0-9]+(\.[0-9][0-9]?)?">/20<br>
						<br>
						<label>Commentaire:</label>
						<textarea name="commentaire" style="width:80%;height:150px;vertical-align: top;"></textarea><br>
						<br>
						<button type = "submit" name="enregistrer" VALUE = 1>Enregistrer</button>
					</form>
					<?php
						if (isset($_POST["enregistrer"])){
							$idEtu = $_POST["butselect"];
							$update_request = "update PasseEntretien set Note = ".$_POST["note"].", Commentaire = '".$_POST["commentaire"]."' where idEtu like ".$idEtu." and idEn like '".$idEN."'";
							if (mysqli_query($conn, $update_request)){
								echo "<mark>Enregistré</mark>";
							};
							
						};
					?>
				</div> 
				<div id="calendrier" style="background-color:#ABB2B9;">
					<iframe src="https://calendar.google.com/calendar/embed?height=300&amp;wkst=2&amp;bgcolor=%23A79B8E&amp;ctz=Europe%2FParis&amp;src=cTJ1NmdvNTVrbzNvOGUwYXZyZzhrYnN0M29AZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=dWY5Z2pvdWZ2OGY3NGx0YmVlczNkbTNmbXNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=ZnIuZnJlbmNoI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;color=%23616161&amp;color=%23EF6C00&amp;color=%234285F4&amp;showDate=0&amp;showNav=1&amp;showPrint=1&amp;showTabs=0&amp;showTz=1&amp;showTitle=0" style="border-width:0" width="300" height="300" frameborder="0" scrolling="no"></iframe>
					<script>
					function printPage() { window.print(); }
					function readCookie(name) {
							var nameEQ = name + "=";
							var ca = document.cookie.split(';');
							for (var i = 0; i < ca.length; i++) {
								var c = ca[i];
								while (c.charAt(0) == ' ') c = c.substring(1, c.length);
								if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
							}
						return null;
					}
					</script>
					<br>
					<a class="hide-on-mobile" href="javascript:printPage();"><i class="fa fa-print"></i> Print Page</a>
				</div>
			</div>
		</div>
		<div id="sub_body">
		<div class="col-md-3 widget">
			<h3 class="widget-title">Contact</h3>
			<div class="widget-body">			
				<p><a <a href="mailto:admission@polytech-annecy-chambery.fr" target="_top" Style="color:#33FFBC;">
					Nous écrire</a></p>
				<p>Tel: +33(0)450 096 600</p>
				<p>Polytech Annecy-Chambéry<br/>
					5 chemin Bellevue / Annecy-le-Vieux / 74940 ANNECY / FRANCE	
				</p>
			</div>
		</div>
	</div>
	</body>
</html>