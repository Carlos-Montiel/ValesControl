<?php
include_once('unidad_de_transporte.php');

/*recibimos las variables post*/
  $noecovc=$_POST["noecovc"];

  


$objetoUnidadDeTransporte=new UnidadDeTransporte;/*se crea un objeto de la clase recibo*/

$respuestacut=new stdClass();/*para guardar la respuesta con json se declara la variable*/

$datos_ut=$objetoUnidadDeTransporte->consultar_noecoc($noecovc);/*se llama la funcion crear*/

if($row=mysql_fetch_array($datos_ut)){
    $respuestacut->mostrar_vehiculo_datosc=
    "<span class='titulo-cons'> >>>>>>> Resultado Consultar-Vehiculo: <<<<<<< <br></span><div class='clearfix'></div>".
    "<span class='enc_cv'>No eco.:</span><input type='text' id='noeco_vcons' readonly class='modificar_v' value='".$row['No_eco']."'/>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>No Inventario:</span><input type='text' id='mod1' class='modificar_v' readonly value='".$row['No_inventario']."'/>"."<div class='editd' onClick='javascript:modifica_DV(noeco_vcons, 1, mod1);'>.</div>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>Localidad:</span><input type='text' id='mod2' class='modificar_v' readonly value='".$row['Localidad']."'/>"."<div class='editd' onClick='javascript:modifica_DV(noeco_vcons, 2, mod2);'>.</div>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>Municipio:</span><input type='text' id='mod3' class='modificar_v' readonly value='".$row['Municipio']."'/>"."<div class='editd' onClick='javascript:modifica_DV(noeco_vcons, 3, mod3);'>.</div>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>Marca:</span><input type='text' id='mod4' class='modificar_v' readonly value='".$row['Marca']."'/>"."<div class='editd' onClick='javascript:modifica_DV(noeco_vcons, 4, mod4);'>.</div>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>Tipo:</span><input type='text' id='mod5' class='modificar_v' readonly value='".$row['Tipo']."'/>"."<div class='editd' onClick='javascript:modifica_DV(noeco_vcons, 5, mod5);'>.</div>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>Modelo:</span><input type='text' id='mod6' class='modificar_v' readonly value='".$row['Modelo']."'/>"."<div class='editd' onClick='javascript:modifica_DV(noeco_vcons, 6, mod6);'>.</div>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>Placas:</span><input type='text' id='mod7' class='modificar_v' readonly value='".$row['Placas']."'/>"."<div class='editd' onClick='javascript:modifica_DV(noeco_vcons, 7, mod7);'>.</div>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>Kilometraje:</span><input type='text' id='mod8' class='modificar_v' readonly value='".$row['Kilometraje']."'/>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>No. de Id. Vehicular:</span><input type='text' id='mod9' class='modificar_v' readonly value='".$row['No_identificacion_vehicular']."'/>"."<div class='editd' onClick='javascript:modifica_DV(noeco_vcons, 9, mod9);'>.</div>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>No. de Motor:</span><input type='text' id='mod10' class='modificar_v' readonly value='".$row['No_motor']."'/>"."<div class='editd' onClick='javascript:modifica_DV(noeco_vcons, 10, mod10);'>.</div>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>No. de Cilintros:</span><input type='text' id='mod11' class='modificar_v' readonly value='".$row['No_cilintros']."'/>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>Rendimiento P/Litro:</span><input type='text' id='mod12' class='modificar_v' readonly value='".$row['Rendimiento_p_litro']."'/>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>Aseguradora:</span><input type='text' readonly id='mod13' class='modificar_v' value='".$row['Aseguradora']."'/>"."<div class='editd' onClick='javascript:modifica_DV(noeco_vcons, 13, mod13);'>.</div>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>Poliza:</span><input type='text' class='modificar_v' id='mod14' readonly value='".$row['Poliza']."'/>"."<div class='editd' onClick='javascript:modifica_DV(noeco_vcons, 14, mod14);'>.</div>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>Exped:</span><input type='text' class='modificar_v' id='mod15' readonly value='".$row['Exped']."'/>"."<div class='editd' onClick='javascript:modifica_DV(noeco_vcons, 15, mod15);'>.</div>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>Vigencia:</span><input type='text' class='modificar_v' id='mod16' readonly value='".$row['Vigencia']."'/>"."<div class='editd' onClick='javascript:modifica_DV(noeco_vcons, 16, mod16);'>.</div>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>Verificacion:</span><input type='text' class='modificar_v' id='mod17' readonly value='".$row['Verificacion']."'/>"."<div class='editd' onClick='javascript:modifica_DV(noeco_vcons, 17, mod17);'>.</div>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>No. Tipo de Servicio:</span><input type='text' class='modificar_v' id='mod18' readonly value='".$row['Numero_tipo_de_servicio']."'/>"."<div class='editd' onClick='javascript:modifica_DV(noeco_vcons, 18, mod18);'>.</div>".
    "<div class='clearfix'></div>".
    "<span class='enc_cv'>Edo. Fisico:</span><input type='text' class='modificar_v' id='mod19' readonly value='".$row['Estado_fisico']."'/>"."<div class='editd' onClick='javascript:modifica_DV(noeco_vcons, 19, mod19);'>.</div>".
    "<div class='clearfix'></div>";

$respuestacut->No_eco=$row['No_eco'];
$respuestacut->No_inventario=$row['No_inventario'];
$respuestacut->Localidad=$row['Localidad'];
$respuestacut->Municipio=$row['Municipio'];
$respuestacut->Marca=$row['Marca'];
$respuestacut->Tipo=$row['Tipo'];
$respuestacut->Modelo=$row['Modelo'];
$respuestacut->Placas=$row['Placas'];
$respuestacut->Kilometraje=$row['Kilometraje'];
$respuestacut->No_identificacion_vehicular=$row['No_identificacion_vehicular'];
$respuestacut->No_motor=$row['No_motor'];
$respuestacut->No_cilintros=$row['No_cilintros'];
$respuestacut->Rendimiento_p_litro=$row['Rendimiento_p_litro'];
$respuestacut->Aseguradora=$row['Aseguradora'];
$respuestacut->Poliza=$row['Poliza'];
$respuestacut->Exped=$row['Exped'];
$respuestacut->Vigencia=$row['Vigencia'];
$respuestacut->Verificacion=$row['Verificacion'];
$respuestacut->Numero_tipo_de_servicio=$row['Numero_tipo_de_servicio'];
$respuestacut->Estado_fisico=$row['Estado_fisico'];
$respuestacut->si_no=1;
	
	$respuestacut->informe="Vehiculo Encontrado";
	 }else{

	 	$respuestacut->informe="Vehiculo NO Encontrado en la Base de Datos";
	 	$respuestacut->si_no=0;
	 }





$rejsoncut = json_encode($respuestacut);/*se convierte a json*/
echo $rejsoncut;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>