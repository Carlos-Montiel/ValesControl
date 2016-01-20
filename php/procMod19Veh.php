<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod19=strtoupper($_POST["mod19"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam19=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym19="UPDATE unidad_de_transporte SET Estado_Fisico='$mod19' WHERE No_eco=$idvehic";

    $resultm19=@mysql_query($querym19);

if (!$resultm19) {/*si esta vacio retorna false*/
        $respuestam19->informe="No se Realizaron las Modificaciones";
    $respuestam19->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam19->informe="Se Modificó El Valor Correctamente";
    $respuestam19->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm19 = json_encode($respuestam19);/*se convierte a json*/
echo $rejsonm19;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>