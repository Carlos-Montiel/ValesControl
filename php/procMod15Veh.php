<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod15=strtoupper($_POST["mod15"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam15=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym15="UPDATE unidad_de_transporte SET Exped='$mod15' WHERE No_eco=$idvehic";

    $resultm15=@mysql_query($querym15);

if (!$resultm15) {/*si esta vacio retorna false*/
        $respuestam15->informe="No se Realizaron las Modificaciones";
    $respuestam15->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam15->informe="Se Modificó El Valor Correctamente";
    $respuestam15->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm15 = json_encode($respuestam15);/*se convierte a json*/
echo $rejsonm15;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>