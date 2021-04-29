<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    /*Connexion à la base de données sur le serveur tp-epua*/
		$conn = @mysqli_connect("tp-epua:3308", "richardn", "4d397gwj");    
		
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
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($conn,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($conn,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT * FROM Etudiant where 
              emailEtu = '".$username."' and idEtu = '".$password."' ";
        $exec_requete = mysqli_query($conn,$requete);
        $reponse      = mysqli_fetch_all($exec_requete, MYSQLI_ASSOC);
        $count = count($reponse);
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           /*$_SESSION['emailEtu'] = $reponse[0]['emailEtu'];
		   $_SESSION['idEtu'] = $reponse[0]['idEtu'];
		   $_SESSION['nomEtu'] = $reponse[0]['nomEtu'];
		   $_SESSION['prenomEtu'] = $reponse[0]['prenomEtu'];*/
		   $cookiesName = "idEtu";
		   $cookiesValue = $reponse[0]['idEtu'];
		   setcookie($cookiesName, $cookiesValue);
           header('Location: Etudiant.php');
        }
        else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($conn); // fermer la connexion
?>