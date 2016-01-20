<?php
include_once('reporte.php');

/*recibimos las variables post*/
  $folio_repeliminar=$_POST["folio_repeliminar"];

$objetoReporte=new Reporte;/*se crea un objeto de la clase recibo*/

$respuestaelimrep=new stdClass();/*para guardar la respuesta con json se declara la variable*/

$elim_rep=$objetoReporte->eliminar($folio_repeliminar);/*se llama la funcion crear*/

if($elim_rep==true){

$respuestaelimrep->si_no=1;
	
	$respuestaelimrep->informe="Reporte Eliminado";
	function getContent($archivo){/*funcion para obtener la respuesta de un archivo php*/
          ob_start();
          include ($archivo);
          $out = ob_get_clean();
          return $out;
     }

$respuestaelimrep->tabla=getContent('reporteMuestra.php');
	 }else{

	 	$respuestaelimrep->informe="Reporte NO Eliminado<br>Intente de Nuevo";
	 	$respuestaelimrep->si_no=0;
	 }





$rejsonelimrep = json_encode($respuestaelimrep);/*se convierte a json*/
echo $rejsonelimrep;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>