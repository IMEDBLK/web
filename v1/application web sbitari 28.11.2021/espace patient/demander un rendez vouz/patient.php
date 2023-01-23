<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>patient</title>
    <link rel="stylesheet" href="style.css">
  
</head>
<body>
    <div class="full-page">
        <div class="navbar">
            <div>
                <a href='website.html'>SBITARI</a>
            </div>
            <nav>

                <ul id='MenuItems'>
                    
                    <li><a href='#'>a propos</a></li>
                    <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">deconnecter</button></li>
                </ul>
            </nav>
        </div>
        <div id='login-form'class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button'onclick='login()'class='toggle-btn'>Demande de rendez-vous</button>
                </div>
              <input type="text" name="Name" class="input-field" placeholder="Donnez le nom" />
            <input type="text" name="Surname" class="input-field" placeholder="Donnez le prénom" />
            <input type="text" name="Situation" class="input-field" placeholder="Donnez la situation" />
            <input type="double" name="CIN" class="input-field" placeholder="Donnez la CIN" />
            <input type="double" name="Phone Number" class="input-field" placeholder="Donnez le numéro du telephone" />
            <input type="email" name="Email" class="input-field" placeholder="Donnez l'email" />
            <input type="text" name="Blood type" class="input-field" placeholder="Donnez le type du sang" />
            <input type="text" name="Chronic diseases" class="input-field" placeholder="Donnez les maladies" />
            <input type="text" name="Reason of consultation" class="input-field" placeholder="Donnez la raison du consultation" />
            <input type="date" name="New appointement date" class="input-field"  />
            <button type='submit'class='submit-btn'>demandez un rendez-vous</button>
</form>
	   </div>
        </div>
    </div>
   
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
.
//on insere les données du formulaire dans la table 
$sql=("INSERT INTO `patient`(`cin`, `nom`, `prenom`, `age`, `sexe` , `maladie` , `description`) VALUES ('$_POST[cin]','$_POST[nom]','$_POST[prenom]','$_POST[age]','$_POST[gendre]','$_POST[maladie]','$_POST[description]')");
if (!mysqli_query($con,$sql))
{
die('impossible d’ajouter cet enregistrement : ' . mysqli_error($con));
}
echo "L’enregistrement est ajouté ";
mysqli_close($con);
}else echo "Un champ est vide";


}
?>
</body>
</html>