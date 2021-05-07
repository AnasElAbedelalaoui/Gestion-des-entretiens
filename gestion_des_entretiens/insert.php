
<!DOCTYPE html>
<html> 
	<head>
		<meta charset = "utf-8">
		<<link rel = "stylesheet" media="all" type="text/css" href="generalStyle1.css">
		<title>Enseignant</title>
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
					<li>
						<a href="deconnexion_adm.php" style="margin-left:82%;color:white; font-size:20px;">Deconnexion</a>
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
					<div id="dispo">
						<h1>Welcome</h1>
						<h2>Marquer vos disponibilités</h2>
						<h3>Validation</h3>
						<?php
	
							$v_id1 = $_GET["validation"];
							$v_id2 = $GLOBALS["_COOKIE"]["idEns"];
							
							$sql_request = "SELECT e.idEn, e.typee, e.idsal, h.dates, h.horraire from Entretien e join Horraire h where e.idEn like '".$v_id1."'";
							$execute_sql_request = mysqli_query($conn, $sql_request);
							$analyzing_result = mysqli_fetch_all($execute_sql_request, MYSQLI_ASSOC);

							echo "<div id='entretien_dispo' style='background-color: green; margin: 10px; width:120px;'>
									Type: ".$analyzing_result[0]["typee"]."<br>Salle: ".$analyzing_result[0]["idsal"]."<br>Date: ".$analyzing_result[0]["dates"]."<br>Heure de debut: ".$analyzing_result[0]["horraire"]."</div>";
							
							$sql_insert = "insert into Surveillance values ('".$v_id1."','".$v_id2."')";
							
							$result = mysqli_query($conn, $sql_insert);
							if ($result == true){
								echo "<mark><strong>Votre choix a été pris en compte</strong></mark>";
							};
							echo "
									<a href='Enseignant.php' style = 'width:60px; height:20px; border: 1px solid black;background-color:lightblue;'>Retour</a>
								
								
								";

						?>
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