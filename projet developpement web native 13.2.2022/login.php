<?php

session_start();
header('Content-type: text/html; charset=UTF-8'); 
if(isset($_POST['login']))   
{	
	$user=$_POST['nomu'];
	$pwd=$_POST['pwd'];
	$spe=$_POST['specialite'];
	$errorMessage="";
		try
	{
	$bdd=include('C:\wamp\www\pw2\Connexion de base.php');
	}
	catch (Exception $e)
	{
    die('Erreur: ' . $e->getMessage());
    }
	if ($bdd){
		$req="SELECT * FROM login where nomu='".$user."' and pwd='".$pwd."' and specialite='".$spe."'";
		$result = mysqli_query($cnx,$req);
		$c=mysqli_num_rows($result);
		if($c==0){
			echo "<script>alert('Nom utilisateur ou mot de passe est incorrect')</script>";
			
		}elseif($spe=="Administrateur"){
			
 session_start();
 // On enregistre le login en session
 $_SESSION['login'] = LOGIN;
 // On redirige vers le fichier admin.php
 
header('location:admin.php');
 exit();
			
		}elseif($spe=="Secretaire"){
						
 session_start();
 // On enregistre le login en session
 $_SESSION['login'] = LOGIN;
 // On redirige vers le fichier admin.php
 header('location:Secretaire.php');
	    }elseif($spe=="Medecin"){
						
 session_start();
 // On enregistre le login en session
 $_SESSION['login'] = LOGIN;
 // On redirige vers le fichier admin.php
 header('location:medecin.php');}
}
}

?>
	
			
	


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>login</title>
	<link rel="shortcut icon"  type="image/x-icon" href="image\md.png">
	<link rel="stylesheet" href="styleam.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
 <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<div class="login-box">
  <h2>se connecter</h2>
  <?php
 // Rencontre-t-on une erreur ?
 if(!empty($errorMessage))
 {
 echo '<p>', htmlspecialchars($errorMessage) ,'</p>';
 }
 ?>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="nomu"  placeholder="nom d'utilisateur">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" name="pwd" placeholder="mot de passe">
  </div>
<div  class="textbox" >
<select class="btn2" name="specialite" > 
<option  value="Administrateur">Administrateur</option>
<option  value="Medecin">Médecin</option>
<option  value="Secretaire">Sécretaire</option>
</select>
</div>
  <input type="submit" class="btn" name="login"  value="se connecter">
  <a href="signup.php">crée un compte</a>
</div>
</form>
  </body>

</html>
