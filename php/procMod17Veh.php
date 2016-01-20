<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod17=strtoupper($_POST["mod17"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam17=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym17="UPDATE unidad_de_transporte SET Verificacion='$mod17' WHERE No_eco=$idvehic";

    $resultm17=@mysql_query($querym17);

if (!$resultm17) {/*si esta vacio retorna false*/
        $respuestam17->informe="No se Realizaron las Modificaciones";
    $respuestam17->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam17->informe="Se Modificó El Valor Correctamente";
    $respuestam17->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm17 = json_encode($respuestam17);/*se convierte a json*/
echo $rejsonm17;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>