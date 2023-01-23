<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Fixer RDV</title>	
	<link rel="shortcut icon"  type="image/x-icon" href="image\md.png">
    <link rel="stylesheet" href="style.css">
	   <link rel="stylesheet" href="styleam.css">
    <link rel="stylesheet" href="styleajoutmed.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Sécretaire</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            <li class="nav-item">
              <a class="nav-link " href="ajouterPatient.php">Ajouter Patient</a>
            </li> 
    
            <li class="nav-item">
              <a class="nav-link active " href="fixerRendv.php">Fixer un rendez-vous</a>
            </li>  
    
	
            
          </form>
        </div>
      </div>
     
      <p>
        <a class="btn2" href="login.php">deconnecter</a>
      </p>
    </nav>
    
	<form  method="post">
<div class="login-box">
  <h2>Fixer rendez-vous</h2>
  
  <div class="textbox">
    <i class="name-user"></i>
    <input type="text" name="cin"  placeholder="CIN">
  </div>

  <div class="textbox">
    <i class="name-user"></i>
    <p style='color:#808080'>Date rendez-vous</p><input type="date"  name="dateRDV" required>
    <p style='color:#808080'> </p><input type="time" name="timeRDV" required>
  </div>
  <table>
 <tr><td> <input type="submit" class="btn3" name="fixer" value="Fixer"></td>
   <td> <input type="reset" class="btn3" value="Supprimer"></td></tr>
	</table>
  </form>
  <?php 
if(isset($_POST['fixer']))   
{	
	$cin=$_POST['cin'];
	$dateRDV=$_POST['dateRDV'];
	$timeRDV=$_POST['timeRDV'];
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
		$req="SELECT * FROM rendezvous where  dateRDV='".$dateRDV."' and timeRDV='".$timeRDV."'";
		$result = mysqli_query($cnx,$req);
		$c=mysqli_num_rows($result);
		if($c==TRUE){
			echo "<script>alert('déja fixer')</script>";
			
	}
		elseif($bdd){
			
	//on insere les données du formulaire dans la table 
$req=("INSERT INTO `rendezvous`(`cin`, `dateRDV`, `timeRDV`) VALUES ('$_POST[cin]','$_POST[dateRDV]','$_POST[timeRDV]')");
		$result = mysqli_query($cnx,$req);
echo "<script>alert('Rendez vous Fixer')</script>";
mysqli_close($cnx);
		}
	
}
}



	


?>

  </body>
  
</html>
  