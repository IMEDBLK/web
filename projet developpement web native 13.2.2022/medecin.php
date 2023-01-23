<?php
// On prolonge la session
session_start();

// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['login']))
{
 // Si inexistante ou nulle, on redirige vers le formulaire de login
 header('Location: http://localhost/pw2/login.php');
 exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Médecin</title>
	<link rel="shortcut icon"  type="image/x-icon" href="image\md.png">
	<link rel="stylesheet" href="styleam.css">
    <link rel="stylesheet" href="styleamin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
  </head>
  <body>
  <i class="menu-user"></i>
    
    
    
      <?php
 // Ici on est bien loggué, on affiche un message
 echo "<script>alert('Bienvenue')</script>" ;
 ?>
    
    
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Médecin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="ajouterBilan.php">Gérer Consultation</a>
            </li> 
           
            
         
        </div>
      </div>
      <p>
        <a class="btn2" href="logout.php">deconnecter</a>
      </p>
    </nav>
    
  
  
  
  </div>
  </div>
  
  
  </body>
</html>
