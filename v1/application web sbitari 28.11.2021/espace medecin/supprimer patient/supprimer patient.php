<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>supprimer patient</title>
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
                    <button type='button'onclick='login()'class='toggle-btn'>Supprimer un patient</button>
                    
                </div>
                <form id='login' class='input-group-login'>
                    <input type='text'class='input-field'placeholder='nom du patient' required >
		    <input type='password'class='input-field'placeholder='prenom de patient' required>
		    <input type='checkbox'class='check-box'><span>Je confirme la suppression </span>
		    <button type='submit'class='submit-btn'>Supprimer le patient</button>
		 </form>
		
            </div>
        </div>
    </div>
  
  <?php
    $co_id=@$_POST['CIN'];



    $username="root";
    $password="";
    $database="projet";
    $cnx=mysqli_connect("localhost",$username,$password);
    @mysqli_select_db($cnx,$database) or die( "Désolé la base de données ne peut pas être sélectionnée");
    
    $query="DELETE FROM patient WHERE  CIN='$co_id'";
    
    mysqli_query($cnx,$query);
    
    mysqli_close($cnx);;
    ?>
</body>
</html>