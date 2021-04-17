
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Espace Etudiant</title>

    <meta charset="utf-8">
    <meta name="description" content=" L'interface étudiant" />
    <meta name="keywords" content="étudian , project"

    <link rel="stylesheet" type="text/css" href="css/formulaire.css">
    <link  href="student.jpg" >
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/style.css">


<?php 

$conn = mysqli_connect("tp-epua:3308", "barryabd", "wzgyp715") or die("Impossible de se connecter : ".mysqli_connect_error());  

 

mysqli_select_db($conn, "barryabd") or die("Impossible de sélectionner la base: ".mysqli_connect_error()); 

 

mysqli_query($conn, "SET NAMES UTF8"); 

if(isset($_POST['nom'])){
    
    $uname=$_POST['nom'];
    $password=$_POST['prenom'];
    
    $sql='select * from Etudiant where `nomEtu`="'.$_POST["nom"].'" and prenomEtu="'.$_POST["prenom"].'" limit 1';
    
$result = mysqli_query($conn, $sql) or die("Requête invalide: ".mysqli_error()."\n".$sql);
    
    if(mysqli_num_rows($result)==1){
    	

    }
    else{
    	
        echo " Zuuuuuuuuut :p :p :p :p :p :p";
        exit();
    }
        
}

?>

</head>


    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Menu de navigation ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="acceuil.html" class="b-brand">
                    <div class="b-bg">
                        
                    </div>
                    <span class="b-title">Espace Etudiant </span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                        <a href="index.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Tableau de bord</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Mon dossier</label>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">parcourir</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="informations.html" class="">Informtions Général</a></li>
                            <li class=""><a href="inscriptions.html" class="">Mes inscriptions</a></li>
                            <li class=""><a href="convocations.html" class="">Mes Convocations</a></li>
                            <li class=""><a href="resultats.html" class="">Mes résultats</a></li>
                         
                        </ul>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label> S'inscrire </label>
                    </li>
                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
                        <a href="form_elements.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">S'inscrire</span></a>
                    </li>
                    <li data-username="Table bootstrap datatable footable" class="nav-item">
                        <a href="tbl_bootstrap.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span class="pcoded-mtext">Suivi du dossier</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Mes Rendez-vous</label>
                    </li>
                    <li data-username="Charts Morris" class="nav-item"><a href="chart-morris.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Calendrier</span></a></li>
                    <li data-username="Maps Google" class="nav-item"><a href="map-google.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Mes convocations</span></a></li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Pages</label>
                    </li>
                    <li data-username="Authentication Sign up Sign in reset password Change password Personal information profile settings map form subscribe" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Authentication</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="auth-signup.html" class="" target="_blank">Se connecter</a></li>
                            <li class=""><a href="auth-signin.html" class="" target="_blank">Se déconnecter</a></li>
                        </ul>
                    </li>
                    <li data-username="Sample Page" class="nav-item"><a href="sample-page.html" class="nav-link"><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Page d'acceuil</span></a></li>
                    <li data-username="Disabled Menu" class="nav-item disabled"><a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext"></span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
	


</body>

<body>
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="index.html" class="b-brand">
                   <div class="b-bg">
                       <i class="feather icon-trending-up"></i>
                   </div>
                   <span class="b-title"></span>
               </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown">Découvrir</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:">Entretiens</a></li>
                        <li><a class="dropdown-item" href="javascript:">Projets</a></li>
                        <li><a class="dropdown-item" href="javascript:">Soutenances</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <div class="main-search">
                        <div class="input-group">
                            <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                            <a href="javascript:" class="input-group-append search-close">
                                <i class="feather icon-x input-group-text"></i>
                            </a>
                            <span class="input-group-append search-btn btn btn-primary">
                                <i class="feather icon-search input-group-text"></i>
                            </span>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notifications</h6>
                                <div class="float-right">
                                    <a href="javascript:" class="m-r-10">marquer comme lu</a>
                                    <a href="javascript:">Effacer tous</a>
                                </div>
                            </div>
                            <ul class="noti-body">
                                <li class="n-title">
                                    <p class="m-b-0">Nouveaux Messages</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Besbes </strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>tesssssst</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="n-title">
                                    <p class="m-b-0">tot</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>zakari </strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>notifications de test</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-3.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong> TEST</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>Utilisateur actuel</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="noti-footer">
                                <a href="javascript:">Montrer tous</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown drp-user">
                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                                <span>JTest Personne</span>
                                <a href="auth-signin.html" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="javascript:" class="dropdown-item"><i class="feather icon-settings"></i> Paramétres</a></li>
                                <li><a href="javascript:" class="dropdown-item"><i class="feather icon-user"></i> Compte</a></li>
                                <li><a href="message.html" class="dropdown-item"><i class="feather icon-mail"></i> Mes messages</a></li>
                                <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Se déconnecter</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>

<div class= "content" style=" text-align: center">

<?php
$lien='etudiant.html'; 
    	/*echo readfile('/home/barryabd/public_html/connection/test.php');
        $homepage = file_get_contents('/home/barryabd/public_html/connection/test.php');
		echo $homepage;
		
		echo '<a href="https://tp-epua.univ-smb.fr/~barryabd/connection/bdconnect.php" action="test.php">Click here</a>';*/
        
	echo 'Bienvenue sur votre comptesa majesté ' . htmlspecialchars($_POST["nom"]." ".$_POST["prenom"]) .   '!'  ."\n";  
	

/*session_start();*/

$conn = mysqli_connect("tp-epua:3308", "barryabd", "wzgyp715") or die("Impossible de se connecter : ".mysqli_connect_error());  

 

mysqli_select_db($conn, "barryabd") or die("Impossible de sélectionner la base: ".mysqli_connect_error()); 

 

/*	mysqli_query($conn, "SET NAMES UTF8"); 

if (!isset($_SESSION['nom'])) {
  $_SESSION['nom'] = "zakari";
}
echo "<p> Vous êtes connecté en tant que $_SESSION['nom'] </p>";*/
  




		    $sql = 'SELECT * FROM `Etudiant` WHERE `nomEtu`="'.$_POST["nom"].'" and prenomEtu="'.$_POST["prenom"].'"';
		
			
			$result = mysqli_query($conn, $sql) or die("Requête invalide: ".mysqli_error()."\n".$sql);
				
			while ($row = mysqli_fetch_array($result)) { 
   				echo '<li>'.$row[0].' '.$row[1].' '.$row[2].'<br/></li>';
			} 




		

echo "\n Mes convocations";
	
	

/*session_start();*/

	$conn = mysqli_connect("tp-epua:3308", "barryabd", "wzgyp715") or die("Impossible de se connecter : ".mysqli_connect_error());  

 

mysqli_select_db($conn, "barryabd") or die("Impossible de sélectionner la base: ".mysqli_connect_error()); 

 

mysqli_query($conn, "SET NAMES UTF8"); 
/*
if (!isset($_SESSION['nom'])) {
  $_SESSION['nom'] = "zakari";
}
echo "<p> Vous êtes connecté en tant que $_SESSION['nom'] </p>";*/




		    $sql = 'SELECT DISTINCT Entretien.typee,horraire,dates,nomEns,prenomEns,Entretien.idsal FROM `Entretien`,PasseEntretien p,Etudiant etu,Horraire hor,Salle sa,Entretien ent, Surveillance su, Enseignant ens ,HchoisitparEns h WHERE p.idEn=ent.idEn and p.idEtu=etu.idEtu and ent.idEn=su.idEn and su.idEns=ens.idEns and ent.idsal=sa.idsal and h.idH=hor.idH and ent.idH=hor.idH and `nomEtu`="'.$_POST["nom"].'" and prenomEtu="'.$_POST["prenom"].'"';
		
			
			$result = mysqli_query($conn, $sql) or die("Requête invalide: ".mysqli_error()."\n".$sql);
				
			while ($row = mysqli_fetch_array($result)) { 
   				echo '<li>'.$row[0].' '.$row[1].' '.$row[2].' '.$row[3].' '.$row[4].' '.$row[5].'<br/></li>';
			} 




		

echo "Mes résultats disponibles :";
	
	


/*session_start();*/

	$conn = mysqli_connect("tp-epua:3308", "barryabd", "wzgyp715") or die("Impossible de se connecter : ".mysqli_connect_error());  

 

mysqli_select_db($conn, "barryabd") or die("Impossible de sélectionner la base: ".mysqli_connect_error()); 

 

mysqli_query($conn, "SET NAMES UTF8"); 
/*
if (!isset($_SESSION['nom'])) {
  $_SESSION['nom'] = "zakari";
}
echo "<p> Vous êtes connecté en tant que $_SESSION['nom'] </p>";*/




		    $sql = 'SELECT DISTINCT Entretien.typee, `Note`,`Commentaire`,dates,nomEns,prenomEns FROM `Entretien`,PasseEntretien p,Etudiant etu,Horraire hor,Salle sa,Entretien ent, Surveillance su, Enseignant ens ,HchoisitparEns h WHERE p.idEn=ent.idEn and p.idEtu=etu.idEtu and ent.idEn=su.idEn and su.idEns=ens.idEns and ent.idsal=sa.idsal and h.idH=hor.idH and ent.idH=hor.idH and `nomEtu`="'.$_POST["nom"].'" and prenomEtu="'.$_POST["prenom"].'"';
		
			
			$result = mysqli_query($conn, $sql) or die("Requête invalide: ".mysqli_error()."\n".$sql);
				
			while ($row = mysqli_fetch_array($result)) { 
   				echo '<li>'.$row[0].' '.$row[1].' '.$row[2].' '.$row[3].' '.$row[4].' '.$row[5].'<br/></li>';
			} 




		


	
	?>
	
	</div>
	
	
	<div id="calendrier">
<iframe name="InlineFrame1" id="InlineFrame1" style="width:200px;height:240px;padding-left: 20px" src="https://www.mathieuweb.fr/calendrier/calendrier-des-semaines.php?nb_mois=1&nb_mois_ligne=4&mois=&an=&langue=fr&texte_color=B9CBDD&week_color=DAE9F8&week_end_color=C7DAED&police_color=453413&sel=true" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
</div>
	
<script src="js/vendor-all.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/pcoded.min.js"></script>
     
</body>



</html>
	
