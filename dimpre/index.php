<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    /*
    $db_username = 'styleclem';
    $db_password = 'yanis12345';
    $db_name     = 'styleclem_bdd';
    $db_host     = 'mysql-styleclem.alwaysdata.net';
    */
    $db_username = 'root';
    $db_password = 'root';
    $db_name = 'users';
    $db_host = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
   $username  = ($_POST['username']);
   // $caracInterdit = array("\"", "-", "_","'","@","=");
   // $caracRemplace= array("", "", "");
   // $newphrase = str_replace($caracInterdit,$caracRemplace ,$username );
   
   $password = ($_POST['password']);
   $search = array('&', '"', "'", '-', '_', ')', '=', '~', '{', '[', '|', '`', '$');
    $remplace = array('');
    $new_username = '';
    
    $chars = str_split($username);
    foreach ($chars as $c) {
       $new_username = str_replace($search, $remplace, $username);
    }

    
    
    if($new_username !== "" && $password !== "")
    {
        $requete = "SELECT * FROM users where 
              username = '".$new_username."' and password = '".$password."'";

        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        if($reponse[0]!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $new_username;
           header('Location: principale.php');
        }
        else
        {
           header('Location: PageConnexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: PageConnexion.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: PageConnexion.php');
}
mysqli_close($db); // fermer la connexion
?>