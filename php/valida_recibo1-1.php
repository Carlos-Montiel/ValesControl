<?php
include_once("Maneja_con.php");
$no_foliov=$_POST["no_foliov"];


$obj_con=new ManejaCon;
if ($obj_con->conectar()==true) {
$consultafr1 = "SELECT * FROM recibo WHERE folio_recibo = ( SELECT MAX( folio_recibo ) FROM recibo )";
    $resultfr1 = @mysql_query($consultafr1);

$respuesta_valnoecofr1=new stdClass();/*para guardar la respuesta con json se declara la variable*/

  
if ($row = mysql_fetch_array($resultfr1)){ 
  /*$valmax=$row['folio_recibo'];*/
    $respuesta_valnoecofr1->foliofr1= ($row['Folio_recibo'])+1;
 
  
} else { 
   $respuesta_valnoecofr1->foliofr1= "1";
} 



}else{
  echo "Error al conectar a la BD";
}
$rejson3 = json_encode($respuesta_valnoecofr1);
echo $rejson3;


?>