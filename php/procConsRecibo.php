<?php
include_once('recibo.php');

/*recibimos las variables post*/
  $anio_recibo=$_POST["anio_recibo"];
  $folio_recibo=$_POST["folio_recibo"];
  


$objetoRecibo=new Recibo;/*se crea un objeto de la clase recibo*/

$respuestacrec=new stdClass();/*para guardar la respuesta con json se declara la variable*/

$datos_recibo=$objetoRecibo->consultar_aniofolio($anio_recibo, $folio_recibo);/*se llama la funcion crear*/

if($row=mysql_fetch_array($datos_recibo)){
$respuestacrec->folioRecibo=$row['Folio_recibo'];
$respuestacrec->fechaDia=$row['F_dia'];
$respuestacrec->fechaMes=$row['F_mes'];
$respuestacrec->fechaAnio=$row['F_anio'];
$respuestacrec->AreaSolicitante=$row['Area_solicitante'];
$respuestacrec->noEcoUT=$row['No_eco_U_T'];
$respuestacrec->noOficioComision=$row['No_oficio_comision'];
$respuestacrec->noVale=$row['No_vale'];
$respuestacrec->recorridoAprox=$row['Recorrido_aprox'];
$respuestacrec->montoNumero=$row['Monto_numero'];
$respuestacrec->montoLetra=$row['Monto_letra'];
$respuestacrec->litros=$row['Litros'];
$respuestacrec->nombreRecibi=$row['Nombre_recibi'];
$respuestacrec->nombreVoBo=$row['Nombre_vo.bo'];
$respuestacrec->nombreAutorizo=$row['Nombre_autorizo'];
$respuestacrec->destino=$row['Destino'];
$respuestacrec->si_no=1;
	
	$respuestacrec->informe="Recibo Encontrado";
	 }else{

	 	$respuestacrec->informe="Recibo NO Encontrado en la Base de Datos";
	 	$respuestacrec->si_no=0;
	 }





$rejsoncrec = json_encode($respuestacrec);/*se convierte a json*/
echo $rejsoncrec;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>