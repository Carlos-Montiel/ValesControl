<?php
include_once('vale.php');

/*recibimos las variables post*/
  $anio_vale=$_POST["anio_vale"];
  $num_vale=$_POST["num_vale"];
  


$objetoVale=new Vale;/*se crea un objeto de la clase recibo*/

$respuestacvale=new stdClass();/*para guardar la respuesta con json se declara la variable*/

$datos_vale=$objetoVale->consultar_anionum($anio_vale, $num_vale);/*se llama la funcion crear*/

if($row=mysql_fetch_array($datos_vale)){
	$respuestacvale->mostrar_vale_datosc="<span class='titulo-cons'> >>>>>>> Resultado Consultar-Vale: <<<<<<< <br></span><div class='clearfix'></div>"."<span class='encc'>Numero de Vale: </span><span class='encc1' id='no_valec'>".$row['No_vale']."</span><br> "."<span class='encc'>Fecha: </span><span class='encc1'>".$row['Dia_f_v']." de ".$row['Mes_f_v']." del ".$row['Anio_f_v']."</span><br>".
	"<span class='encc'>No. Eco Unidad de Transporte: </span><span class='encc1'>".$row['No_eco_U_T']."</span><br> "."<span class='encc'>Kilometraje Inicial: </span><span class='encc1'>".$row['K_inicial']."</span><br>"."<span class='encc'>Kilometraje Final: </span><span class='encc1'>".$row['K_final']."</span><br>".
	"<span class='encc'>Recorrido Aproximado: </span><span class='encc1'>".$row['Recorrido_aprox']."</span><br>"."<span class='encc'>Numero de Oficio de Comisión: </span><span class='encc1'>".$row['No_oficio_comision']."</span><br> "."<span class='encc'>Monto: </span><span class='encc1'>"."$".$row['C_C_Monto']."</span><br>".
	"<span class='encc'>Litros Aproximados: </span><span class='encc1'>".$row['C_C_Litros_aprox']."</span><br> "."<span class='encc'>Precio de la Gasolina: </span><span class='encc1'>".$row['Precio_gasolina']."</span><br>"."<span class='encc'>Consumo Por Litro: </span><span class='encc1'>".$row['Consumo_p_litro']."</span><br>".
	"<span class='encc'>Rendimiento por Litro: </span><span class='encc1'>".$row['Rendimiento_p_litro']."</span><br> "."<span class='encc'>De: </span><span class='encc1'>".$row['D_de']."</span><br>"."<span class='encc'>A: </span><span class='encc1'>".$row['D_a']."</span><br>"."<span class='encc'>Conductor: </span><span class='encc1'>".$row['Conductor']."</span><br>";
	$respuestacvale->informe="Vale Encontrado";
	$respuestacvale->si_no=1;
	 }else{

	 	$respuestacvale->informe="Vale NO Encontrado en la Base de Datos";
	 	$respuestacvale->si_no=0;
	 	$respuestacvale->mostrar_vale_datosc="Vale NO Encontrado en la Base de Datos";
	 }





$rejsoncvale = json_encode($respuestacvale);/*se convierte a json*/
echo $rejsoncvale;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>