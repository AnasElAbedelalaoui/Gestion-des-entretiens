<?php
//ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    $username = htmlspecialchars($_POST['username']); 
    $password = htmlspecialchars($_POST['password']);
    
    if($username !== "" && $password !== "")
    {
        if(($username=="angerichardjunior@gmail.com") && ($password = "azerty123")) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: administrateur.php');
        }
        else
        {
           header('Location: login_adm.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login_adm.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login_adm.php');
}
?>