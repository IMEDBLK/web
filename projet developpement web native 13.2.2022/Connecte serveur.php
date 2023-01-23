<?php 
header('Content-type: text/html; charset=UTF-8'); 
$user=!empty($_POST['nomu']) ? $_POST['nomu'] : null;
$mp=!empty($_POST['pwd']) ? $_POST['pwd'] : null;
if ($user&&$mp)//test de saisie nom utilsateue existe mot de passe existe
{
	  //Etablir la cconnexion avec le serveur et la BDD
	try
	{
	$bdd=include('C:\wamp\www\pw\Connexion de base.php');
	}
	catch (Exception $e)
	{
    die('Erreur: ' . $e->getMessage());
	}
	if ($bdd)
	{
		//lancer la requête Select
		$sql = "SELECT nom FROM medecin where nomd='".$user."' and mdp='".$mp."'";
		//récuperer le resultat de la requête
		$result = mysqli_query($cnx,$sql);
		if (!$result) //requête mal formulée
		{
			//echo "La requête SELECT a échoué.";
			die('<p>ERREUR Requête invalide : '.mysqli_error($cnx).'</p>');
		} 
		else 
		{
			//compter les enregistrements
			$c=mysqli_num_rows($result);
			if ($c==0)
			{
				echo('Utilisateur inexistant');
			}	
			else
			{
			//afficher les données
			while ($enreg = mysqli_fetch_array($result))
			{
				echo  "Bonjour ".$enreg["nom"]."<br />\n" ;
			}
		     mysqli_close($cnx);       
			}
		}
}
	
}
else 
{
	exit();
}
?>