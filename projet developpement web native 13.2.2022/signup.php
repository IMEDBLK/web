<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

   <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="style2.css">
	<link rel="stylesheet" href="styleam.css">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon"  type="image/x-icon" href="image\md.png">
 </head>
  <body>
  <form name="f1" method="post">
<div class="signup-box">
  <h2>créer un compte</h2
    >
  <div class="textbox">
    <i class="username-user"></i>
   <input type="text" name="nomu" placeholder="nom d'utilisateur">
  </div>
  
  <div class="textbox">
    <i class="name-user"></i>
   <input type="text" name="nom"  placeholder="nom">
  </div>
  <div class="textbox">
    <i class="surname-user"></i>
   <input type="text" name="prenom" placeholder="prenom">
  </div>
  <div  class="textbox" for="etes">
    <i class="name-user"></i>
	<p style="color:#808080;font-size:18px">Spécialite</p>
	<select class="btn2" name="specialite">
	<meta charset="utf-8">
<option  value="Administrateur">Administrateur</option>
<option  value="Medecin">Médecin</option>
<option  value="Secretaire">Sécretaire</option>
</select>
</div>
   
   <div class="textbox">
    <i class="name-user"></i>
	<p style="color:#808080;font-size:18px">Date Naissance</p>
   <input type="Date" name="dateN" placeholder="date de naissance">
  </div>
  <div class="textbox">
    <i class="mail-user"></i>
   <input type="text" name="mail"  placeholder="email" required>
  </div>

  <div class="textbox">
    <i class="paswd"></i>
    <input type="password" name="pwd" placeholder="mot de passe" required>
  </div>
  <div class="textbox">
    <i class="passwd"></i>
    <input type="password"  name="rpwd" placeholder="retapé votre mot de passe" required>
  </div>

  <input type="submit" id="submit" class="btn" value="créer un compte">

  <a href="login.php">se connecter</a>
</div>
</form>
<SCRIPT LANGUAGE="JavaScript">
function checkPw(){
pw1 = document.f1.pwd.value;
pw2 = document.f1.rpwd.value;

if (pw1 != pw2) {
alert ("les mots de passes ne correspondent pas")
return false;
}
else return true;
}
</script>

<script>
let b1=document.getElementById('submit');
b1.addEventListener('click',checkPw);

</script>

<?php
header('Content-type: text/html; charset=UTF-8'); 
//On teste si le formulaire a été soumis
	if ((isset($_POST['nomu'])) && (isset($_POST['nom'])) && (isset($_POST['prenom'])) && (isset($_POST['specialite'])) && (isset($_POST['dateN'])) && (isset($_POST['mail'])) && (isset($_POST['pwd'])) && (isset($_POST['rpwd'])) )
	{
		
	//on teste si tous les champs du formulaire sont remplits
	if ((!empty($_POST['nomu'])) && (!empty($_POST['nom']))	&& (!empty($_POST['prenom'])) && (!empty($_POST['specialite'])) && (!empty($_POST['dateN'])) && (!empty($_POST['mail'])) && (!empty($_POST['pwd'])) && (!empty($_POST['rpwd'])))
	{
	//on se connecte au srveur
$con=mysqli_connect("localhost","root","")or die("Erreur serveur");
                             

	
if (! $con){
die("ne pourrait pas se relier : ". mysqli_error ($con));
}
// on selectionne la base de données
mysqli_select_db ($con,"projet") ;

//on insere les données du formulaire dans la table 
$sql=("INSERT INTO `login`(`nomu`, `nom`, `prenom`, `specialite`, `dateN`, `mail`, `pwd`, `rpwd`) VALUES ('$_POST[nomu]','$_POST[nom]','$_POST[prenom]','$_POST[specialite]','$_POST[dateN]','$_POST[mail]','$_POST[pwd]','$_POST[rpwd]')");
if (!mysqli_query($con,$sql))
{
die('impossible d’ajouter cet enregistrement : ' . mysqli_error($con));
}
echo "<script>alert('L’enregistrement est ajouté')</script>";

mysqli_close($con);

}else echo "<script>alert('Un champ est vide')</script>";


}
?>
  </body>


</html>
