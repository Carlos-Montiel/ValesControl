<?php
include_once('unidad_de_transporte.php');

/*recibimos las variables post*/
  $noeco_veeliminar=$_POST["noeco_veeliminar"];

$objetoVehiculo=new UnidadDeTransporte;/*se crea un objeto de la clase recibo*/

$respuestaelimveh=new stdClass();/*para guardar la respuesta con json se declara la variable*/

$elim_veh=$objetoVehiculo->eliminar($noeco_veeliminar);/*se llama la funcion crear*/

if($elim_veh==true){

$respuestaelimveh->si_no=1;
	
	$respuestaelimveh->informe="Vehiculo Eliminado";
	function getContent($archivo){/*funcion para obtener la respuesta de un archivo php*/
          ob_start();
          include ($archivo);
          $out = ob_get_clean();
          return $out;
     }

$respuestaelimveh->tabla=getContent('unidad_de_transporte_Muestra.php');
	 }else{

	 	$respuestaelimveh->informe="Vehiculo NO Eliminado<br>Intente de Nuevo";
	 	$respuestaelimveh->si_no=0;
	 }





$rejsonelimval = json_encode($respuestaelimveh);/*se convierte a json*/
echo $rejsonelimval;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>