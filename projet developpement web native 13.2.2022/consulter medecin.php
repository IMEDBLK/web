<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
	  <link rel="stylesheet" href="styleam.css">
    <link rel="stylesheet" href="styleConsulter.css">
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
              <a class="nav-link" aria-current="page" href="ajoutermedecin.php">ajouter medecin</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link " href="modifier medecin.php">modifier fiche medecin</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link active" href="#">consulter la liste de medicin</a>
            </li> 
            
          </form>
        </div>
      </div>
    
      <p>
        <a class="btn2" href="login.php">deconnecter</a>
      </p>
    </nav>
    
    
 


<?php
// $NbreData : le nombre de données à afficher
// $NbrCol : le nombre de colonnes
// $NbrLigne : calcul automatique a la FIN
// -------------------------------------------------------
// (exemple)
$NbrCol = 6;
// requête
$serveurBD = "localhost";
 $nomUtilisateur = "root";
 $motDePasse = "";
 $baseDeDonnees = "projet";
 $cnx=mysqli_connect($serveurBD,$nomUtilisateur,$motDePasse,$baseDeDonnees)
 or die("Impossible de se connecter au serveur de bases de données.");
 @mysqli_select_db($cnx,$baseDeDonnees)or die("Cette base de donnees n'existe pas");
 $sql = "SELECT * FROM medecin";
 $result = mysqli_query($cnx,$sql);

// -------------------------------------------------------
$NbreData = mysqli_num_rows($result);
// -------------------------------------------------------
// affichage
$NbrLigne = 1;
if ($NbreData != 0) {
$j = 1;

echo '<table class="table" border="2">

<tr>

<th>Nom dutlisateur</th>

<th>Nom</th>

<th>Prénom</th>


<th>Date Naissance</th>

<th>Email</th>
</tr>';

while ($val = mysqli_fetch_array($result)) {
   if ($j%$NbrCol == 1) {
      
	  $NbrLigne++;
	
	 echo '<br>';
      echo "<tr>";
	  
      $fintr = 0;
   }
  
 
    // ------------------------------------------
    // AFFICHAGE des DONNEES de la fiche

 
   echo"<td>".$val['nomu']. "</td>";
   
   
   echo "<td>" .$val['nom']. "</td>";
   
 
	  
    echo"<td>" .$val['prenom']."</td>"; 
	

	 echo "<td>" .$val['dateN']. "</td>";
	
	  echo "<td>".$val['mail']."</td>";

  
   echo "</tr>";
  
    // ------------------------------------------
  
   if ($j%$NbrCol == 0) {
	   
      

      $fintr = 1;
   }
   $j++;
}
if ($fintr!=1) { echo '</tr>'; }
echo '</table>';
} else {
echo  "<script>alert('pas de données à afficher')</script>";
}
?>
<?php
// déconnexion de la base
mysqli_close($cnx); 
?> 
  </body>
</html>
