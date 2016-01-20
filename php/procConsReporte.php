<?php
include_once('reporte.php');

/*recibimos las variables post*/
  $folioReporte=$_POST["folio_reporte"];
  


$objetoReporte=new Reporte;/*se crea un objeto de la clase recibo*/

$respuestacrep=new stdClass();/*para guardar la respuesta con json se declara la variable*/

$datos_reporte=$objetoReporte->consultar_folio($folioReporte);/*se llama la funcion crear*/

if($row=mysql_fetch_array($datos_reporte)){
	$respuestacrep->resultado_cons_rep="<span class='titulo-cons'> >>>>>>> Resultado Consultar-Reporte: <<<<<<< <br></span><div class='clearfix'></div>"."<span class='encc'>Folio: </span><span class='encc1' id='folio_repc'>".$row['Folio_reporte']."</span><br> "."<span class='encc'>Fecha de Realización: </span><span class='encc1'>".$row['Fecha_realizacion']."</span><br>".
	"<span class='encc'>Mes y Año Consultados: </span><span class='encc1'>".$row['Mes']." del ".$row['Anio']."</span><br> "."<span class='encc'>Factura: </span><span class='encc1'>".$row['Factura']."</span><br>".
	"<span class='encc'>No. Eco Unidad de Transporte: </span><span class='encc1'>".$row['No_eco_U_T']."</span><br> "."<span class='encc'>Numero Total de Vales: </span><span class='encc1'>".$row['No_total_vales']."</span><br>".
	"<span class='encc'>Total de Recorrido: </span><span class='encc1'>".$row['Total_recorrido']." KM</span><br> "."<span class='encc'>Total Importe: </span><span class='encc1'>$ ".$row['Total_importe']."</span><br>".
	"<span class='encc'>Total de Litros: </span><span class='encc1'>".$row['Total_litros']." Litros</span><br> "."<span class='encc'>Observaciones: </span><span class='encc1'>".$row['Observaciones']."</span><br>".
	"<span class='encc'>Elaboró: </span><span class='encc1'>".$row['Nombre_elaboro']."</span><br> "."<span class='encc'>VO. BO.: </span><span class='encc1'>".$row['Nombre_vobo']."</span><br>"."<span class='encc'>Autorizó: </span><span class='encc1'>".$row['Nombre_autorizo']."</span><br>";
	$respuestacrep->informe="Reporte Encontrado";
	
	 }else{
	 	$respuestacrep->resultado_cons_rep="Reporte NO Encontrado en la Base de Datos";
	 	$respuestacrep->informe="Reporte NO Encontrado en la Base de Datos";
	 }





$rejsoncrep = json_encode($respuestacrep);/*se convierte a json*/
echo $rejsoncrep;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>