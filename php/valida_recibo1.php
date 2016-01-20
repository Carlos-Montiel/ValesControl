<?php
include_once("Maneja_con.php");
$no_foliov=$_POST["no_foliov"];


$obj_con=new ManejaCon;
if ($obj_con->conectar()==true) {
$consultafr = "SELECT * FROM recibo WHERE folio_recibo = ( SELECT MAX( folio_recibo ) FROM recibo )";
    $resultfr = @mysql_query($consultafr);

$respuesta_valnoecofr=new stdClass();/*para guardar la respuesta con json se declara la variable*/

  
if ($row = mysql_fetch_array($resultfr)){ 
  /*$valmax=$row['folio_recibo'];*/
    $respuesta_valnoecofr->foliofr= ($row['Folio_recibo'])+1;
 
  
} else { 
   $respuesta_valnoecofr->foliofr= "1";
} 



}else{
  echo "Error al conectar a la BD";
}
$rejson2 = json_encode($respuesta_valnoecofr);
echo $rejson2;


?>