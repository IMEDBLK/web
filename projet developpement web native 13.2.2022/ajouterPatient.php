<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ajouter Patient</title>
	<link rel="shortcut icon"  type="image/x-icon" href="image\md.png">
	 <link rel="stylesheet" href="styleam.css">
    <link rel="stylesheet" href="styleajp.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
	    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <i class="menu-user"></i>
    
    
    
    
    
    

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Sécretaire</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
   
            
            <li class="nav-item">
              <a class="nav-link active" href="ajouterPatient.php">Ajouter Patient</a>
            </li> 
    
            <li class="nav-item">
              <a class="nav-link " href="fixerRendv.php">Fixer un rendez-vous</a>
            </li>  
    
            
          </form>
        </div>
      </div>
      <p>
        <a class="btn2" href="login.php">deconnecter</a>
      </p>
    </nav>
    
  
  </div>
  </div>


    <form method="POST" >
    <div class="signup-box">
  <h2>ajouter Patient</h2>
  <div class="textbox">
    <i class="username-user"></i>
   <input type="text" name="cin" placeholder="CIN">
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
  <input type="text" name="age" placeholder="age">
  </div>
  <div  class="textbox" for="gendre">
<select class="btn2" name="gendre"> 
<option  value="homme">homme</option>
<option  value="femme">femme</option>
</select>
</div>
  <div class="textbox">
    <i class="mail-user"></i>
   <input type="text" name="maladie" placeholder="maladie">
  </div>
  <div class="textbox">
    <i class="mail-user"></i>
  <label for="adresse">Description:</label>
<textarea name="description" Type="text" cols="17" rows="4" placeholder="ici ecrire"></textarea></div>


  <input type="submit" class="btn3" value="ajouter un patient">

</div>
</form>
  <?php

//On teste si le formulaire a été soumis
	if ((isset($_POST['cin'])) && (isset($_POST['nom']))	&& (isset($_POST['prenom'])) && (isset($_POST['age'])) && (isset($_POST['gendre'])) && (isset($_POST['maladie'])) && (isset($_POST['description'])))
	{
	//on teste si tous les champs du formulaire sont remplits
	if ((!empty($_POST['cin'])) && (!empty($_POST['nom']))	&& (!empty($_POST['prenom'])) && (!empty($_POST['age'])) && (!empty($_POST['gendre'])) && (!empty($_POST['maladie'])) && (!empty($_POST['description'])))
	{
	//on se connecte au srveur
$con=mysqli_connect("localhost","root","")or die("Erreur serveur");
                             

	
if (! $con){
die("ne pourrait pas se relier : ". mysqli_error ($con));
}
// on selectionne la base de données
mysqli_select_db ($con,"projet") ;

//on insere les données du formulaire dans la table 
$sql=("INSERT INTO `patient`(`cin`, `nom`, `prenom`, `age`, `sexe` , `maladie` , `description`) VALUES ('$_POST[cin]','$_POST[nom]','$_POST[prenom]','$_POST[age]','$_POST[gendre]','$_POST[maladie]','$_POST[description]')");
if (!mysqli_query($con,$sql))
{
die( "<script>alert('impossible d’ajouter cet enregistrement : ')</script>". mysqli_error($con));
}
echo "<script>alert('L’enregistrement est ajouté')</script>";
mysqli_close($con);
}else echo "<script>alert('Un champ est vide')</script>";


}
?>


<?php 

echo "<table class='table' border='2'>

<tr>

<th>CIN</th>

<th>Nom</th>

<th>Prénom</th>

<th>Age</th>



</tr>";

         echo "<tr>";
         if(isset($_POST['cin']))
             echo "<td>".strip_tags($_POST['cin'])."</td>";
		 if(isset($_POST['nom']))
             echo "<td>".strip_tags($_POST['nom'])."</td>";
         if(isset($_POST['prenom']))
             echo "<td>".strip_tags($_POST['prenom'])."</td>";
         if(isset($_POST['age']))
             echo "<td>".strip_tags($_POST['age'])."</td>";
        
  echo "</tr>";
echo"</table>";

?>
    



         

         
	     


  

  
  
  </body>
</html>
