<?php
$cnx=mysqli_connect("localhost","root","","projet")or die("Erreur serveur");
$db=mysqli_select_db($cnx,"projet")or die("Erreur Connexion");                               
?>