<?php
include_once('recibo.php');

/*recibimos las variables post*/
  $folioRecibo=$_POST["folio_recibo"];
  $fechaDia=$_POST["f_dia_recibo"];
  $fechaMes=strtoupper($_POST["f_mes_recibo"]);
  $fechaAnio=$_POST["f_anio_recibo"];
  $AreaSolicitante=strtoupper($_POST["area_recibo"]);
  $noEcoUT=$_POST["noeco_recibo"];
  $noOficioComision=$_POST["ofcom_recibo"];
  $noVale=$_POST["novale"];
  $recorridoAprox=$_POST["recorridoaprox_recibo"];
  $montoNumero=$_POST["monto_recibo"];
  $montoLetra=strtoupper($_POST["montoletra_recibo"]);
  $litros=$_POST["litros_recibo"];
  $nombreRecibi=strtoupper($_POST["firma1_recibo"]);
  $nombreVoBo=strtoupper($_POST["firma2_recibo"]);
  $nombreAutorizo=strtoupper($_POST["firma3_recibo"]);
  $destino=strtoupper($_POST["destinoa_recibo"]);

sleep(2);

$objetoRecibo=new Recibo;/*se crea un objeto de la clase recibo*/

$respuesta=new stdClass();/*para guardar la respuesta con json se declara la variable*/

if($objetoRecibo->crear($folioRecibo,$fechaDia,$fechaMes,$fechaAnio,$AreaSolicitante,$noEcoUT,$noOficioComision,$noVale,
  $recorridoAprox,$montoNumero,$montoLetra,$litros,$nombreRecibi,$nombreVoBo,$nombreAutorizo,$destino)==true){/*se llama la funcion crear*/
  	$respuesta->informe="Recibo Insertado Correctamente";
}else{
	$respuesta->informe="Error de Insercion<br>Revisa los Datos e Intentalo de Nuevo.";
}

function getContent($archivo){/*funcion para obtener la respuesta de un archivo php*/
          ob_start();
          include ($archivo);
          $out = ob_get_clean();
          return $out;
     }

$respuesta->tabla=getContent('reciboMuestra.php');/*se llama la funcion para guardar la respuesta echo de reciboMuestra y guardarlo en una variable*/
$rejson = json_encode($respuesta);/*se convierte a json*/
echo $rejson;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>