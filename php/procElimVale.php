<?php
include_once('vale.php');

/*recibimos las variables post*/
  $folio_valeliminar=$_POST["folio_valeliminar"];

$objetoVale=new Vale;/*se crea un objeto de la clase recibo*/

$respuestaelimval=new stdClass();/*para guardar la respuesta con json se declara la variable*/

$elim_val=$objetoVale->eliminar($folio_valeliminar);/*se llama la funcion crear*/

if($elim_val==true){

$respuestaelimval->si_no=1;
	
	$respuestaelimval->informe="Vale Eliminado";
	function getContent($archivo){/*funcion para obtener la respuesta de un archivo php*/
          ob_start();
          include ($archivo);
          $out = ob_get_clean();
          return $out;
     }

$respuestaelimval->tabla=getContent('valeMuestra.php');
	 }else{

	 	$respuestaelimval->informe="Vale NO Eliminado<br>Intente de Nuevo";
	 	$respuestaelimval->si_no=0;
	 }





$rejsonelimvale = json_encode($respuestaelimval);/*se convierte a json*/
echo $rejsonelimvale;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>