<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $tsve=$_POST["tsve"];

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestavts=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $queryts="SELECT * FROM tipo_de_servicio WHERE Numero=$tsve";

    $resultts=@mysql_query($queryts);

if (!$resultts) {/*si esta vacio retorna false*/
    $respuestavts->informe="Indefinido";
    $respuestavts->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
	$row=mysql_fetch_array($resultts);
    $respuestavts->informe=$row['Tipo'];
    $respuestavts->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonvts = json_encode($respuestavts);/*se convierte a json*/
echo $rejsonvts;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>