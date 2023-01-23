<?php

//multiple_update.php

include('database_connection.php');

if(isset($_POST['hidden_cin']))
{
 $taille= $_POST['taille'];
 $poid= $_POST['poid'];
 $temp = $_POST['temp'];
 $result = $_POST['result'];
 $sang = $_POST['sang'];
 $diab = $_POST['diab'];
 $autre = $_POST['autre'];
 $rendezvous = $_POST['rendezvous'];
 $cin = $_POST['hidden_cin'];
 for($count = 0; $count < count($cin); $count++)
 {
  $data = array(
   ':taille'   => $taille[$count],
   ':poid'  => $poid[$count],
   ':temp'  => $temp[$count],
   ':result' => $result[$count],
   ':sang' => $sang[$count],
   ':diab' => $diab[$count],
   ':autre' => $autre[$count],
   ':rendezvous' => $rendezvous[$count],
   
  
   ':cin'   => $cin[$count]
  );
$query = "
  UPDATE bilan
  SET taille = :taille, poid= :poid, temp = :temp, result = :result, sang = :sang, diab = :diab, autre = :autre, rendezvous = :rendezvous 
  WHERE cin = :cin
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
 }
}

?>