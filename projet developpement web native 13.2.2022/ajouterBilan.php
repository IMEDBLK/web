<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  
<SCRIPT LANGUAGE="JavaScript">
function popup() {
w=open("",'popup','width=400,height=200,toolbar=no,scrollbars=no,resizable=yes');
w.document.write("<BODY>");
w.document.write("Taille: "+document.forms[0].elements["taille"].value+"<BR><BR>");
w.document.write("Poids: "+document.forms[0].elements["poid"].value+"<BR><BR>");
w.document.write("Température: "+document.forms[0].elements["temp"].value+"<BR><BR>");
w.document.write("Résultat de l'examen: "+document.forms[0].elements["result"].value+"<BR><BR>");
w.document.write("Groupe sanguin: "+document.forms[0].elements["sang"].value+"<BR><BR>");
w.document.write("Diabetique: "+document.forms[0].elements["diab"].value+"<BR><BR>");
w.document.write("Autre maladie: "+document.forms[0].elements["autre"].value+"<BR><BR>");
w.document.write("</BODY>");
w.document.close();
w.print();
}
</SCRIPT>
    <meta charset="utf-8">
    <title>Ajouter Consultation</title>
     <link rel="shortcut icon"  type="image/x-icon" href="image\md.png">
    <link rel="stylesheet" href="styleab.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
  </head>
  <body>
  <i class="menu-user"></i>
    
    
    

    
    
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Médecin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="#">Ajouter Consultation</a>
            </li> 
           
            <li class="nav-item">
              <a class="nav-link" href="modifierBilan.php">Modifier Consultation</a>
            </li> 
			
          <li class="nav-item">
              <a class="nav-link" href="supprimerBilan.php">Supprimer Consultation</a>
            </li>
			
			<li class="nav-item">
              <a class="nav-link" href="consulterBilan.php">Consulter </a>
            </li>
			
        </div>
      </div>
      <p>
        <a class="btn2" href="logout.php">deconnecter</a>
      </p>
    </nav>






  <form  method="POST">
<div class="signup-box">
  <h2>Consultation</h2>
    
	<div class="textbox">
    <i class="surname-user"></i>
   <input type="text" name="cin" placeholder="CIN">
  </div>
  
  <div class="textbox">
    <i class="username-user"></i>
   <input type="text" name="taille" placeholder="Taille">
  </div>
  
  <div class="textbox">
    <i class="name-user"></i>
   <input type="text" name="poid"  placeholder="Poids">
  </div>
  <div class="textbox">
    <i class="surname-user"></i>
   <input type="text" name="temp" placeholder="Température">
  </div>

  
  <div class="textbox">
    <i class="mail-user"></i>
 <label  style="color:#808080;font-size:18px" for="result">Résultat de l'examen:</label>
<textarea name="result" Type="text" cols="17" rows="4" placeholder="ici ecrire"></textarea></div>

 <div class="textbox" for="sang" >

	<p style="color:#808080;font-size:18px">groupe sanguin: </p>
<select class="btn2" name="sang">
   <option value="A">A</option>
  <option value="B"> B</option>
  <option value="AB">AB</option>
  <option value="O">O</option>
</select>
</div>
  
  <div class="textbox" for="diab" >
 
	<p style="color:#808080;font-size:18px">diabetique:  </p>
    <select class="btn2" name="diab">
   <option value="oui">Oui</option>
  <option value="non">Non</option>
</select>
</div>
  
  <div class="textbox">
    <i class="mail-user"></i>
   <input type="text" name="autre" placeholder="Autre maladie:">
    </div>
	
<div class="textbox">
    <i class="mail-user"></i>
   <input type="text" name="medicament" placeholder="médicament:">
   </div>
    <table>
	<tr><td><input type="submit"  class="btn3" value="Ajouter"></td>
	 <td><input type="reset"  class="btn3" value="Supprimer"></td>
	 <td><input class="btn3" type="submit" onclick='javascript:popup()' value="Imprimer"></td>
	 </tr>
	 
</table>

	
	</div>


</form>
 



  <?php

//On teste si le formulaire a été soumis
	if ((isset($_POST['cin'])) && (isset($_POST['taille']))	&& (isset($_POST['poid'])) && (isset($_POST['temp'])) && (isset($_POST['result'])) && (isset($_POST['sang'])) && (isset($_POST['diab'])) && (isset($_POST['autre'])) && (isset($_POST['medicament'])) )
	{
	//on teste si tous les champs du formulaire sont remplits
	if ((!empty($_POST['cin'])) && (!empty($_POST['taille']))	&& (!empty($_POST['poid'])) && (!empty($_POST['temp'])) && (!empty($_POST['result'])) && (!empty($_POST['sang'])) && (!empty($_POST['diab'])) && (!empty($_POST['autre'])) && (!empty($_POST['medicament'])))
	{
	//on se connecte au srveur
$con=mysqli_connect("localhost","root","")or die("Erreur serveur");
                             

	
if (! $con){
die("ne pourrait pas se relier : ". mysqli_error ($con));
}
// on selectionne la base de données
mysqli_select_db ($con,"projet") ;

//on insere les données du formulaire dans la table 
$sql=("INSERT INTO `bilan`(`cin`, `taille`, `poid`, `temp`, `result`, `sang`, `diab`, `autre`, `medicament` ) VALUES ('$_POST[cin]','$_POST[taille]','$_POST[poid]','$_POST[temp]','$_POST[result]','$_POST[sang]','$_POST[diab]','$_POST[autre]','$_POST[medicament]')");
if (!mysqli_query($con,$sql))
{
die( "<script>alert('impossible d’ajouter cet enregistrement : ')</script>". mysqli_error($con));
}
echo "<script>alert('L’enregistrement est ajouté')</script>";
mysqli_close($con);
}else echo "<script>alert('Un champ est vide')</script>";


}
?>









	



</body>
</html>