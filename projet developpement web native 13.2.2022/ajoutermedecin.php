<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ajouter médecin</title>
	<link rel="shortcut icon"  type="image/x-icon" href="image\md.png">
	   <link rel="stylesheet" href="styleam.css">
    <link rel="stylesheet" href="styleajoutmed.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">administrateur</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">ajouter medecin</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="modifier medecin.php">modifier fiche medecin</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="consulter medecin.php">consulter la liste de medicin</a>
            </li> 
            
          </form>
        </div>
      </div>
    
      <p>
        <a class="btn2" href="login.php">deconnecter</a>
      </p>
    </nav>
    
    
    <form method="POST">
    <div class="signup-box">
  <h2>ajouter medecin</h2>
  <div class="textbox">
    <i class="username-user"></i>
   <input type="text" name="nomu" placeholder="nom d'utilisateur">
  </div>
  
  <div class="textbox">
    <i class="name-user"></i>
   <input type="text" name="nom" placeholder="nom">
  </div>
  <div class="textbox">
    <i class="surname-user"></i>
   <input type="text" name="prenom" placeholder="prenom">
  </div>
  <div class="textbox" >
    <i class="age-user"></i>
  <p style='color:#808080'>Date Naissance:</p><input type="date" name="dateN"  placeholder="date Naissance">
  </div>
  <div class="textbox">
    <i class="mail-user"></i>
   <input type="text" name="mail" placeholder="mail">
  </div>


  <input type="submit" class="btn3" value="ajouter un medecin">

</div>
</form>

 
 <?php

//On teste si le formulaire a été soumis
	if ((isset($_POST['nomu'])) && (isset($_POST['nom']))	&& (isset($_POST['prenom'])) && (isset($_POST['dateN'])) && (isset($_POST['mail']) ))
	{
	//on teste si tous les champs du formulaire sont remplits
	if ((!empty($_POST['nomu'])) && (!empty($_POST['nom']))	&& (!empty($_POST['prenom'])) && (!empty($_POST['dateN'])) && (!empty($_POST['mail'])))
	{
	//on se connecte au srveur0
$con=mysqli_connect("localhost","root","")or die("Erreur serveur");
                             

	
if (! $con){
die("ne pourrait pas se relier : ". mysqli_error ($con));
}
// on selectionne la base de données
mysqli_select_db ($con,"projet") ;

//on insere les données du formulaire dans la table 
$sql=("INSERT INTO `medecin`(`nomu`, `nom`, `prenom`, `dateN`, `mail`) VALUES ('$_POST[nomu]','$_POST[nom]','$_POST[prenom]','$_POST[dateN]','$_POST[mail]')");
if (!mysqli_query($con,$sql))
{
die("<script>alert('impossible d’ajouter cet enregistrement : ')</script>". mysqli_error($con));
}
echo "<script>alert('L’enregistrement est ajouté  : ')</script>";
mysqli_close($con);
}else echo "<script>alert('Un champ est vide')</script>";


}
?>


<?php 

echo "<table class='table' border='2'>

<tr>

<th>Nom d'utlisateur</th>

<th>Nom</th>

<th>Prénom</th>

<th>Date Naissance</th>

<th>Email</th>

</tr>";

         echo "<tr>";
         if(isset($_POST['nomu']))
             echo "<td>".strip_tags($_POST['nomu'])."</td>";
		 if(isset($_POST['nom']))
             echo "<td>".strip_tags($_POST['nom'])."</td>";
         if(isset($_POST['prenom']))
             echo "<td>".strip_tags($_POST['prenom'])."</td>";
         if(isset($_POST['dateN']))
             echo "<td>".strip_tags($_POST['dateN'])."</td>";
         if(isset($_POST['mail']))
             echo "<td>".strip_tags($_POST['mail'])."</td><br>";
  echo "</tr>";
echo"</table>";

?>
    



         
 
         
	     


  

</body>
</html>
