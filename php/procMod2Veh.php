<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod2=strtoupper($_POST["mod2"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam2=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym2="UPDATE unidad_de_transporte SET Localidad='$mod2' WHERE No_eco=$idvehic";

    $resultm2=@mysql_query($querym2);

if (!$resultm2) {/*si esta vacio retorna false*/
        $respuestam2->informe="No se Realizaron las Modificaciones";
    $respuestam2->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam2->informe="Se Modificó El Valor Correctamente";
    $respuestam2->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm2 = json_encode($respuestam2);/*se convierte a json*/
echo $rejsonm2;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>