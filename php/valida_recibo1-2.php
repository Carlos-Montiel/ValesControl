<?php
include_once("Maneja_con.php");
$preciogas_recibo=$_POST["preciogas_recibo"];
$mes_gas=$_POST["mes_gas"];
$anio_gas=$_POST["anio_gas"];

$obj_con=new ManejaCon;
if ($obj_con->conectar()==true) {
$consultapgr = "SELECT Precio FROM precio_gas WHERE Anio = $anio_gas AND Mes = '$mes_gas'";
    $resultpgr = @mysql_query($consultapgr);

$respuesta_valnoecopgr=new stdClass();/*para guardar la respuesta con json se declara la variable*/

  
if ($row = mysql_fetch_array($resultpgr)){ 
  /*$valmax=$row['folio_recibo'];*/
    $respuesta_valnoecopgr->preciogas= ($row['Precio']);
 $respuesta_valnoecopgr->informe_gas= "ok";
  
} else { 
   $respuesta_valnoecopgr->preciogas="";
    $respuesta_valnoecopgr->informe_gas= "Tienes que Indicar el Precio Mensual de la Gasolina!";
} 



}else{
  echo "Error al conectar a la BD";
}
$rejsonpg = json_encode($respuesta_valnoecopgr);
echo $rejsonpg;


?>