<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod10=strtoupper($_POST["mod10"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam10=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym10="UPDATE unidad_de_transporte SET No_motor='$mod10' WHERE No_eco=$idvehic";

    $resultm10=@mysql_query($querym10);

if (!$resultm10) {/*si esta vacio retorna false*/
        $respuestam10->informe="No se Realizaron las Modificaciones";
    $respuestam10->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam10->informe="Se Modificó El Valor Correctamente";
    $respuestam10->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm10 = json_encode($respuestam10);/*se convierte a json*/
echo $rejsonm10;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>