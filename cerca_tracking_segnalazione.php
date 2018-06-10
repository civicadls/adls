<?php 

include "db.php";

$tracking=$_POST['Tracking'];


$query=mysql_query("select * from Segnalazioni where Tracking='$tracking'");

$informazioni=array();
while($result = mysql_fetch_assoc($query)){

$informazioni[]=array(
'id_segnalazione'=>$result['id_segnalazione'],
'Tracking'=>$result['Tracking'],
'Comune'=>$result['Comune'],
'Importanza'=>$result['Importanza'],
'Foto'=>$result['Foto'],
'Latitudine'=>$result['Latitudine'],
'Longitudine'=>$result['Longitudine']
);
     }

 echo json_encode(array("results"=>$informazioni));




?>