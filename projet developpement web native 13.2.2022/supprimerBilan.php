<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Supprimer bilan</title>
	<link rel="shortcut icon"  type="image/x-icon" href="image\md.png">
	<link rel="stylesheet" href="styleam.css">
    <link rel="stylesheet" href="styleamin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
  </head>
  <body>
  <i class="menu-user"></i>
    
    
    
    
    
    
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="ajouterBilan.php">Ajouter Consultation</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link " href="modifierBilan.php">Modifier Consultation</a>
            </li> 
			
			 <li class="nav-item">
              <a class="nav-link active " href="#">Supprimer Consultation</a>
            </li> 
			
            <li class="nav-item">
              <a class="nav-link " href="consulterBilan.php">Consulter </a>
            </li> 
            
          
        </div>
      </div>
      <p>
        <a class="btn2" href="index.html">deconnecter</a>
      </p>
    </nav>
    
    <form method="POST">
    <div class="signup-box">
  <h2>Supprimer Bilan</h2>
  <div class="textbox">
    <i class="username-user"></i>
   <input type="text" name="cin" placeholder="CIN">
  </div>
  
  



  <input type="submit" name="submit" class="btn3" value="Supprimer Bilan">

</div>
</form>
  <?php
if(!empty($_POST['cin'])){
$co_id=@$_POST['cin'];



$username="root";
$password="";
$database="projet";
$cnx=mysqli_connect("localhost",$username,$password);
@mysqli_select_db($cnx,$database) or die( "Désolé la base de données ne peut pas être sélectionnée");

$query="DELETE FROM bilan WHERE  cin='$co_id'";



if(mysqli_query($cnx,$query)){
	
	echo "<script>alert('Supprimer avec succes')</script>";
	


}

}else echo "<script>alert('Champ vider')</script>";

?>
</body>
</html>