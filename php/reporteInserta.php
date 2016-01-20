<?php
include_once('reporte.php');

/*recibimos las variables post*/
  $Folio_reporte=$_POST["Folio_reporte"];
  $Fecha_realizacion=$_POST["Fecha_realizacion"];
  $Mes=strtoupper($_POST["Mes"]);
  $Anio=$_POST["Anio"];
  $Factura=strtoupper($_POST["Factura"]);
  $No_Eco_U_T=$_POST["No_Eco_U_T"];
  $No_total_vales=$_POST["No_total_vales"];
  $Total_recorrido=$_POST["Total_recorrido"];
  $Total_importe=$_POST["Total_importe"];
  $Total_litros=$_POST["Total_litros"];
  $Observaciones=strtoupper($_POST["Observaciones"]);
  $Nombre_elaboro=strtoupper($_POST["Nombre_elaboro"]);
  $Nombre_vobo=strtoupper($_POST["Nombre_vobo"]);
  $Nombre_autorizo=strtoupper($_POST["Nombre_autorizo"]);


sleep(2);

$objetoReporte=new Reporte;/*se crea un objeto de la clase recibo*/

$respuesta=new stdClass();/*para guardar la respuesta con json se declara la variable*/

if($objetoReporte->crear($Folio_reporte, $Fecha_realizacion, $Mes, $Anio, $Factura, $No_Eco_U_T, $No_total_vales,
  $Total_recorrido, $Total_importe, $Total_litros, $Observaciones, $Nombre_elaboro, $Nombre_vobo, $Nombre_autorizo)==true){/*se llama la funcion crear*/
  	$respuesta->informe="Reporte Insertado Correctamente";
}else{
	$respuesta->informe="Error de Insercion<br>Revisa los Datos e Intentalo de Nuevo.";
}


$rejson = json_encode($respuesta);/*se convierte a json*/
echo $rejson;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>