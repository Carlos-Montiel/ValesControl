<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod6=$_POST["mod6"];

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam6=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym6="UPDATE unidad_de_transporte SET Modelo=$mod6 WHERE No_eco=$idvehic";

    $resultm6=@mysql_query($querym6);

if (!$resultm6) {/*si esta vacio retorna false*/
        $respuestam6->informe="No se Realizaron las Modificaciones";
    $respuestam6->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam6->informe="Se Modificó El Valor Correctamente";
    $respuestam6->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm6 = json_encode($respuestam6);/*se convierte a json*/
echo $rejsonm6;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>