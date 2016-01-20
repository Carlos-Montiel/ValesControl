<?php
include_once("unidad_de_transporte.php");
/*Recibimos variables enviadas desde javascript y obtenidas del formulario*/
$noeco_vehiculo=$_POST["noeco_vehiculo"];
$noinv_vehiculo=strtoupper($_POST["noinv_vehiculo"]);
$localidad_vehiculo=strtoupper($_POST["localidad_vehiculo"]);
$municipio_vehiculo=strtoupper($_POST["municipio_vehiculo"]);
$marca_vehiculo=strtoupper($_POST["marca_vehiculo"]);
$tipo_vehiculo=strtoupper($_POST["tipo_vehiculo"]);
$modelo_vehiculo=$_POST["modelo_vehiculo"];
$placas_vehiculo=strtoupper($_POST["placas_vehiculo"]);
$noid_vehiculo=strtoupper($_POST["noid_vehiculo"]);
$nomotor_vehiculo=strtoupper($_POST["nomotor_vehiculo"]);
$nocilintros_vehiculo=$_POST["nocilintros_vehiculo"];
$aseguradora_vehiculo=strtoupper($_POST["aseguradora_vehiculo"]);
$poliza_vehiculo=strtoupper($_POST["poliza_vehiculo"]);
$exped_vehiculo=$_POST["exped_vehiculo"];
$vigencia_vehiculo=$_POST["vigencia_vehiculo"];
$verificacion_vehiculo=strtoupper($_POST["verificacion_vehiculo"]);
$km_vehiculo=$_POST["km_vehiculo"];
$renl_vehiculo=$_POST["renl_vehiculo"];
$tiposerv_vehiculo=$_POST["tiposerv_vehiculo"];
$edofisico_vehiculo=strtoupper($_POST["edofisico_vehiculo"]);


sleep(2);/*pa q se tarde*/

$objUnidadT=new UnidadDeTransporte;/*objeto de la clase unidad de transporte*/

$respuesta=new stdclass();/*se crea la variable para la respuesta json*/

if($objUnidadT->insertarUnidadDeTransporte($noeco_vehiculo,$noinv_vehiculo,$localidad_vehiculo,$municipio_vehiculo,$marca_vehiculo,
$tipo_vehiculo,$modelo_vehiculo,$placas_vehiculo,$km_vehiculo,$noid_vehiculo,$nomotor_vehiculo,$nocilintros_vehiculo,$renl_vehiculo,
$aseguradora_vehiculo,$poliza_vehiculo,$exped_vehiculo,$vigencia_vehiculo,$verificacion_vehiculo,$tiposerv_vehiculo,
$edofisico_vehiculo)==true){/*se llama a la fucion insertar y devuelve el resultado true o false*/
$respuesta->informe="Se ha Insertado un Nuevo Vehiculo";
}else{
$respuesta->informe="Error al Intentar Insertar Vehiculo<br> Revisa los Datos y Vuelve a Intentar";
}

function getcontent($enlace){/*para obtener el 'echo' del otro archivo*/
ob_start();
include ($enlace);
$out=ob_get_clean();
return $out;
}

$respuesta->tabla=getcontent('unidad_de_transporte_Muestra.php');/*implementacion de la funcion get contente para almacenar en una variable*/

$respuestajson=json_encode($respuesta);/*se convierte a json*/
echo $respuestajson;/*imprime respuesta convertida*/

?>