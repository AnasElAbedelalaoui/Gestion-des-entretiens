<!DOCTYPE html>
<?php   
        /*Connexion à la base de données sur le serveur tp-epua*/
		$conn = @mysqli_connect("tp-epua:3308", "barryabd", "wzgyp715");    
		/*tp-epua:3308*/
		/*connexion à la base de donnée depuis la machine virtuelle INFO642*/
		/*$conn = @mysqli_connect("localhost", "etu", "bdtw2021");*/  

		if (mysqli_connect_errno()) {
            $msg = "erreur ". mysqli_connect_error();
        } else {  
            $msg = "connecté au serveur " . mysqli_get_host_info($conn);
            /*Sélection de la base de données*/
            mysqli_select_db($conn, "barryabd"); 
            /*mysqli_select_db($conn, "etu"); */ /*sélection de la base sous la VM info642*/
		
            /*Encodage UTF8 pour les échanges avecla BD*/
            mysqli_query($conn, "SET NAMES UTF8");
        }	
 ?> 
<html> 
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" media="all" type="text/css" href="generalStyle1.css">
		<title>Etudiant</title>
	</head>

	<body>
		<div id="box">
		
			<div id = "en_tete">
				<ul id="element">
					<li>
						<a href="etudiant.php" class="logo"><b Style="color:white;font-size:20px;">POLYTECH <span Style="color:#33FFBC;">ANNECY</span></b></a>
					</li>
					<li>
						<a href="deconnexion_etu.php" style="margin-left:82%;color:white; font-size:20px;">Deconnexion</a>
					</li>
				</ul>
			</div>  
			
			<div id = "corps">
				<div id="menu">
					<div id="sub_menu">
						<a id="list_sub_menu" href ="etudiant.php" style="background-color: #48C9B0;text-align: center;">--Accueil--</a>
						<a id="list_sub_menu" href ="infogeneral.php">Informations générales</a>
						<label id="list_sub_menu" style="font-size:30px;">Mes Convocations</label>	
						<a id="list_sub_menu" href ="convocationpeip.php">PEIP</a>
						<a id="list_sub_menu" href ="convocationing.php">CYCLE INGENIEUR</a>
						<label id="list_sub_menu" style="font-size:30px;">Mes résultats</label>	
						<a id="list_sub_menu" href ="resultatpeip.php">PEIP</a>
						<a id="list_sub_menu" href ="resultating.php">CYCLE INGENIEUR</a>
					</div>
				</div>
			
				<div id= "Information" >
					<div class= "titre" style=" text-align: center">
						<h1>
							<?php
								$idEtu = $GLOBALS["_COOKIE"]["idEtu"];
								$firstRequest = "select * from Etudiant where idEtu like ".$idEtu.";";
								$resultFirstRequest = mysqli_query($conn, $firstRequest);
								$finalResult = mysqli_fetch_all($resultFirstRequest, MYSQLI_ASSOC);
								$prenom = $finalResult[0]["prenomEtu"];
								$nom = $finalResult[0]["nomEtu"];
								
								$conn = mysqli_connect("tp-epua:3308", "barryabd", "wzgyp715") or die("Impossible de se connecter : ".mysqli_connect_error());  
								mysqli_select_db($conn, "barryabd") or die("Impossible de sélectionner la base: ".mysqli_connect_error()); 
								mysqli_query($conn, "SET NAMES UTF8"); 
								
								echo 'Bienvenue sur votre compte ' . htmlspecialchars($nom." ".$prenom) .   '!'  ."\n";
								echo"</h1>";
								echo"</div>";
								echo"<div class= 'identifiant' style=' text-align: center'>";
								echo"<h3>";
								
								echo 'Votre numéro d\'identifiant est '.$idEtu.' <br/>';
								
								echo"</h3>";
								echo"</div>";
								echo"<br><br>";	
								echo"<div  style=' text-align: center'>";
								echo"<h3>";
								echo"Mes convocations :";
								echo"</h3>	";
								echo"<h4>	";
								echo"<table class= 'convoc'>";
								echo"<tr>";
								echo"<td>Type d'entretien</td>";
								echo"<td>Heure</td>";
								echo"<td>Date</td>";
								echo"<td>Nom du professeur</td>";
								echo"<td>Prenom du professeur</td>";
								echo"<td> Salle</td>";
								echo"</tr>";
								
								$sql = 'SELECT DISTINCT Entretien.typee,horraire,dates,nomEns,prenomEns,Entretien.idsal FROM `Entretien`,PasseEntretien p,Etudiant etu,Horraire hor,Salle sa,Entretien ent, Surveillance su, Enseignant ens ,HchoisitparEns h WHERE p.idEn=ent.idEn and p.idEtu=etu.idEtu and ent.idEn=su.idEn and su.idEns=ens.idEns and ent.idsal=sa.idsal and h.idH=hor.idH and ent.idH=hor.idH and `nomEtu`="'.$nom.'" and prenomEtu="'.$prenom.'"';
								
								$result = mysqli_query($conn, $sql);
								while ($row = mysqli_fetch_array($result)) { 
									echo '<tr>';
									echo '<td>'. $row[0].'</td> '  ;
									echo '<td>'.$row[1].'</td> ' ;
									echo '<td> '.$row[2].'</td> ';
									echo '<td>'.$row[3].'</td> '  ;
									echo '<td> '.$row[4].'</td> ';
									echo '<td> '.$row[5].'</td> ';
									echo '</tr>';
								} 
								
								echo"</table>";
								echo"</h4>";	
								echo"</div>	";
								echo"<br><br>";
								echo"<div class= 'resultat' style='text-align: center'>";
								echo"<h3>";
								echo"	Mes résultats :";
								echo"</h3>	";
								echo"<h4>	";
								echo"<table class= 'result'>";
								echo"<tr>";
								echo"<td>Type d'entretien</td>";
								echo"<td>Notes</td>";
								echo"<td>Commentaire</td>";
								echo"<td>Date</td>";
								echo"<td>Nom du professeur</td>";
								echo"<td>Prenom du professeur</td> ";
								echo"</tr>";
								
								$sql = 'SELECT DISTINCT Entretien.typee, `Note`,`Commentaire`,dates,nomEns,prenomEns FROM `Entretien`,PasseEntretien p,Etudiant etu,Horraire hor,Salle sa,Entretien ent, Surveillance su, Enseignant ens ,HchoisitparEns h WHERE p.idEn=ent.idEn and p.idEtu=etu.idEtu and ent.idEn=su.idEn and su.idEns=ens.idEns and ent.idsal=sa.idsal and h.idH=hor.idH and ent.idH=hor.idH and `nomEtu`="'.$nom.'" and prenomEtu="'.$prenom.'"';	
								$result = mysqli_query($conn, $sql) or die("Requête invalide: ".mysqli_error()."\n".$sql);			
								while ($row = mysqli_fetch_array($result)) {
									echo '<tr>';
									echo '<td>'. $row[0].'</td> '  ;
									echo '<td>'.$row[1].'</td> ' ;
									echo '<td> '.$row[2].'</td> ';
									echo '<td>'.$row[3].'</td> '  ;
									echo '<td> '.$row[4].'</td> ';
									echo '<td> '.$row[5].'</td> ';
									echo '</tr>';
								}
							?>	
							</table>
						</h4>	
					</div>	
				</div>
				<div id="calendrier">
					<iframe src="https://calendar.google.com/calendar/embed?height=300&amp;wkst=2&amp;bgcolor=%23A79B8E&amp;ctz=Europe%2FParis&amp;src=cTJ1NmdvNTVrbzNvOGUwYXZyZzhrYnN0M29AZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=dWY5Z2pvdWZ2OGY3NGx0YmVlczNkbTNmbXNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=ZnIuZnJlbmNoI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;color=%23616161&amp;color=%23EF6C00&amp;color=%234285F4&amp;showDate=0&amp;showNav=1&amp;showPrint=1&amp;showTabs=0&amp;showTz=1&amp;showTitle=0" style="border-width:0" frameborder="0" scrolling="no"></iframe>
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