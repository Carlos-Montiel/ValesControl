<?php
include_once('recibo.php');

/*recibimos las variables post*/
  $folio_receliminar=$_POST["folio_receliminar"];

$objetoRecibo=new Recibo;/*se crea un objeto de la clase recibo*/

$respuestaelimrec=new stdClass();/*para guardar la respuesta con json se declara la variable*/

$elim_rec=$objetoRecibo->eliminar($folio_receliminar);/*se llama la funcion crear*/

if($elim_rec==true){

$respuestaelimrec->si_no=1;
	
	$respuestaelimrec->informe="Recibo Eliminado";
	function getContent($archivo){/*funcion para obtener la respuesta de un archivo php*/
          ob_start();
          include ($archivo);
          $out = ob_get_clean();
          return $out;
     }

$respuestaelimrec->tabla=getContent('reciboMuestra.php');
	 }else{

	 	$respuestaelimrec->informe="Recibo NO Eliminado<br>Intente de Nuevo";
	 	$respuestaelimrec->si_no=0;
	 }





$rejsonelimrec = json_encode($respuestaelimrec);/*se convierte a json*/
echo $rejsonelimrec;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>