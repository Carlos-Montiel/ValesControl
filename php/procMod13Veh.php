<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod13=strtoupper($_POST["mod13"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam13=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym13="UPDATE unidad_de_transporte SET Aseguradora='$mod13' WHERE No_eco=$idvehic";

    $resultm13=@mysql_query($querym13);

if (!$resultm13) {/*si esta vacio retorna false*/
        $respuestam13->informe="No se Realizaron las Modificaciones";
    $respuestam13->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam13->informe="Se Modificó El Valor Correctamente";
    $respuestam13->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm13 = json_encode($respuestam13);/*se convierte a json*/
echo $rejsonm13;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>