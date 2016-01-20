<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod14=strtoupper($_POST["mod14"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam14=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym14="UPDATE unidad_de_transporte SET Poliza='$mod14' WHERE No_eco=$idvehic";

    $resultm14=@mysql_query($querym14);

if (!$resultm14) {/*si esta vacio retorna false*/
        $respuestam14->informe="No se Realizaron las Modificaciones";
    $respuestam14->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam14->informe="Se Modificó El Valor Correctamente";
    $respuestam14->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm14 = json_encode($respuestam14);/*se convierte a json*/
echo $rejsonm14;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>