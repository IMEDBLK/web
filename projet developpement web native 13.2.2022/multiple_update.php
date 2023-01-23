<?php

//multiple_update.php

include('database_connection.php');

if(isset($_POST['hidden_nomu']))
{
 $nom = $_POST['nom'];
 $prenom = $_POST['prenom'];
 $dateN = $_POST['dateN'];
 $mail = $_POST['mail'];
 $nomu = $_POST['hidden_nomu'];
 for($count = 0; $count < count($nomu); $count++)
 {
  $data = array(
   ':nom'   => $nom[$count],
   ':prenom'  => $prenom[$count],
   ':dateN'  => $dateN[$count],
   ':mail' => $mail[$count],
  
   ':nomu'   => $nomu[$count]
  );
$query = "
  UPDATE medecin
  SET nom = :nom, prenom = :prenom, dateN = :dateN, mail = :mail 
  WHERE nomu = :nomu
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
 }
}

?>