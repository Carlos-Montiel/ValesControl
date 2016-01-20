<?php
include_once("Maneja_con.php");
$noEco=$_POST["noeco_recibo"];


$obj_con=new ManejaCon;
if ($obj_con->conectar()==true) {
$consulta = "SELECT * FROM unidad_de_transporte WHERE No_eco=$noEco";
    $result = @mysql_query($consulta);

$respuesta_valnoeco=new stdClass();/*para guardar la respuesta con json se declara la variable*/

  if ($row = mysql_fetch_array($result)){ 
  	$respuesta_valnoeco->informe= "Vehiculo Encontrado";
  $respuesta_valnoeco->noeco_vehiculo=$row['No_eco'];
  $respuesta_valnoeco->noinv_vehiculo=$row['No_inventario'];
  $respuesta_valnoeco->localidad_vehiculo=$row['Localidad'];
  $respuesta_valnoeco->municipio_vehiculo=$row['Municipio'];
  $respuesta_valnoeco->marca_vehiculo=$row['Marca'];
  $respuesta_valnoeco->tipo_vehiculo=$row['Tipo'];
  $respuesta_valnoeco->modelo_vehiculo=$row['Modelo'];
  $respuesta_valnoeco->placas_vehiculo=$row['Placas'];
  $respuesta_valnoeco->km_vehiculo=$row['Kilometraje'];
  $respuesta_valnoeco->noid_vehiculo=$row['No_identificacion_vehicular'];
  $respuesta_valnoeco->nomotor_vehiculo=$row['No_motor'];
  $respuesta_valnoeco->nocilintros_vehiculo=$row['No_cilintros'];
  $respuesta_valnoeco->renl_vehiculo=$row['Rendimiento_p_litro'];
  $respuesta_valnoeco->aseguradora_vehiculo=$row['Aseguradora'];
  $respuesta_valnoeco->poliza_vehiculo=$row['Poliza'];
  $respuesta_valnoeco->exped_vehiculo=$row['Exped'];
  $respuesta_valnoeco->vigencia_vehiculo=$row['Vigencia'];
  $respuesta_valnoeco->verificacion_vehiculo=$row['Verificacion'];
  $respuesta_valnoeco->tiposerv_vehiculo=$row['Numero_tipo_de_servicio'];
  $respuesta_valnoeco->edofisico_vehiculo=$row['Estado_fisico'];
  
} else { 
   $respuesta_valnoeco->informe= "¡ No se ha encontrado el Vehiculo en la Base de Datos Si Pretende usar este No. Eco de Vehiculo Primero Insertelo a la BD !";
   $respuesta_valnoeco->noeco_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->noinv_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->localidad_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->municipio_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->marca_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->tipo_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->modelo_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->placas_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->km_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->noid_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->nomotor_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->nocilintros_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->renl_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->aseguradora_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->poliza_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->exped_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->vigencia_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->verificacion_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->tiposerv_vehiculo="Vehiculo Inexsitente!";
  $respuesta_valnoeco->edofisico_vehiculo="Vehiculo Inexsitente!"; 
} 



}else{
	echo "Error al conectar a la BD";
}
$rejson1 = json_encode($respuesta_valnoeco);
echo $rejson1;

?>