<?php
include_once("Maneja_con.php");
$preciogas_recibo=$_POST["preciogas_recibo"];
$mes_gas=$_POST["mes_gas"];
$anio_gas=$_POST["anio_gas"];

$obj_con=new ManejaCon;
if ($obj_con->conectar()==true) {

$consultaif = "SELECT * FROM precio_gas WHERE Anio = $anio_gas AND Mes = '$mes_gas'";
    $resultif = @mysql_query($consultaif);

$respuesta_pgc=new stdClass();/*para guardar la respuesta con json se declara la variable*/

  
if ($row = mysql_fetch_array($resultif)){ 
	/*si ya hay algo solo se modifica*/
$modificarp="UPDATE precio_gas SET Precio=$preciogas_recibo WHERE Anio = $anio_gas AND Mes = '$mes_gas'"; 
$resmod=mysql_query($modificarp);
if (!$resmod) {
  $respuesta_pgc->informecmpg="No se pudo Modificar el Precio Mensual de la Gasolina Intente de Nuevo";
}else{
$respuesta_pgc->informecmpg="Precio Mensual de la gasolina Modificado Correctamente";
}

  
} else {
	/*si no hay un registro q coincida con el mes y el año se inserta*/
$insertarp="INSERT INTO precio_gas (Anio, Mes, Precio) values($anio_gas, '$mes_gas', $preciogas_recibo)"; 
$resins=mysql_query($insertarp);
if (!$resins) {
	$respuesta_pgc->informecmpg="No se pudo Modificar el Precio Mensual de la Gasolina Intente de Nuevo";
}else{
$respuesta_pgc->informecmpg="Precio Mensual de la gasolina Insertado Correctamente";
}
} 



}else{
  echo "Error al conectar a la BD";
}
$rejsonpgc = json_encode($respuesta_pgc);
echo $rejsonpgc;


?>