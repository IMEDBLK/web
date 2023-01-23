<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier les cordonnées </title>
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
                    
                    <li><a href='#'>A propos</a></li>
                    <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">deconnecter</button></li>
                </ul>
            </nav>
        </div>
        <div id='login-form'class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button'onclick='login()'class='toggle-btn'>Modifier les coordonnées du patient</button>
                    
                </div>
                <form id='login' class='input-group-login'>
                    <input type='text'class='input-field'placeholder='nom du patient' required >
		    <input type='password'class='input-field'placeholder='prenom de patient' required>
		    <input type='checkbox'class='check-box'><span> Je confirme </span>
		    <button type='submit'class='submit-btn'>Trouver les coordonnées à modifier</button>
		 </form>
		
            </div>
        </div>
    </div>
  
    $co_id=@$_POST['cin'];
    $co_nom=@$_POST['nom'];
    $co_prenom=@$_POST['prenom'];
    $co_age=@$_POST['age'];
    $co_maladie=@$_POST['maladie'];
    
    
    $username="root";
    $password="";
    $database="projet";
    $cnx=mysqli_connect("localhost",$username,$password);
    @mysqli_select_db($cnx,$database) or die( "Désolé la base de données ne peut pas être sélectionnée");
    
    $query="UPDATE patient SET nom='$co_nom' , prenom='$co_prenom' , age='$co_age', maladie='$co_maladie' WHERE cin='$co_id'";
    mysqli_query($cnx,$query);
    mysqli_close($cnx);;
    ?>
     
      <form method="POST">
        <div class="signup-box">
      <h2>Modifier Patient</h2>
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
    
      <div class="textbox">
        <i class="mail-user"></i>
       <input type="text" name="maladie" placeholder="maladie">
      </div>
    
    
    
      <input type="submit" class="btn3" value="Modifier un patient">
    
    </div>
    </form>
      
      
      
     <?php
    $cin=isset($_GET['cin']);
    $username="root";
    $password="";
    $database="projet";
    $cnx=mysqli_connect("localhost",$username,$password);
    @mysqli_select_db($cnx,$database) or die( "Désolé la base de données ne peut pas être sélectionnée");
    $sql=" SELECT * FROM patient WHERE cin='$cin'";
    $resultat=mysqli_query($sql);
    
     if ($resultat === FALSE) {
     echo "Verfier données";
     } else {
     if($resultat==TRUE) {
     echo  "modifier";
     }
    
     // Et pour mettre fin à la connexion
     mysql_close();
     }
    
    $num=mysqli_num_rows($resultat) or die(mysql_error());
    mysql_close($cnx);
    $i=0;
    while ($i < $num) {
    $nom=mysql_result($resultat,$i,"nom");
    $prenom=mysql_result($resultat,$i,"prenom");
    $age=mysql_result($resultat,$i,"age");
    $maladie=mysql_result($resultat,$i,"maladie");
    
    
    
    ?>

</body>
</html>