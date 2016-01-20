<?php
include_once('vale.php');
include_once("Maneja_con.php");
/*recibimos las variables post*/
  $no_vale=$_POST["no_vale"];
  $f_dia_vale=$_POST["f_dia_vale"];
  $f_mes_vale=strtoupper($_POST["f_mes_vale"]);
  $f_anio_vale=$_POST["f_anio_vale"];
$noeco_vale=$_POST["noeco_vale"];
$kinicial_vale=$_POST["kinicial_vale"];
$kfinal_vale=$_POST["kfinal_vale"];
$recorridoaprox_vale=$_POST["recorridoaprox_vale"];
$ofcom_vale=$_POST["ofcom_vale"];
$monto_vale=$_POST["monto_vale"];
$litros_vale=$_POST["litros_vale"];
$preciogas_vale=$_POST["preciogas_vale"];
$consumopl_vale=$_POST["consumopl_vale"];
$renpl_vale=$_POST["renpl_vale"];
$dde_vale=strtoupper($_POST["dde_vale"]);
$da_vale=strtoupper($_POST["da_vale"]);
$conductor_vale=strtoupper($_POST["conductor_vale"]);

sleep(2);

$objetoVale=new Vale;/*se crea un objeto de la clase recibo*/

$respuesta=new stdClass();/*para guardar la respuesta con json se declara la variable*/

if($objetoVale->crear($no_vale,$f_dia_vale,$f_mes_vale,$f_anio_vale,$noeco_vale,$kinicial_vale,$kfinal_vale,$recorridoaprox_vale,
$ofcom_vale,$monto_vale,$litros_vale,$preciogas_vale,$consumopl_vale,$renpl_vale,$dde_vale,$da_vale,$conductor_vale)==true){/*se llama la funcion crear*/
  	$respuesta->informe="Vale Insertado Correctamente";

$conectmk=new ManejaCon;
if($conectmk->conectar()==true){
$querymk="UPDATE unidad_de_transporte SET Kilometraje=$kfinal_vale WHERE No_eco=$noeco_vale";
$resultmk=mysql_query($querymk);
if (!$resultmk) {
$respuesta->informe1="No se modifico el kilometraje del Vehiculo";
}else{
$respuesta->informe1="Se modifico el Kilometraje del Vehiculo";
}

}


}else{
	$respuesta->informe="Error de Inserción en el Vale <br>Revisa los Datos e Intentalo de Nuevo.";
}

$rejson = json_encode($respuesta);/*se convierte a json*/
echo $rejson;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>