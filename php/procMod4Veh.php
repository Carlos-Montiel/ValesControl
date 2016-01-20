<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod4=strtoupper($_POST["mod4"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam4=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym4="UPDATE unidad_de_transporte SET Marca='$mod4' WHERE No_eco=$idvehic";

    $resultm4=@mysql_query($querym4);

if (!$resultm4) {/*si esta vacio retorna false*/
        $respuestam4->informe="No se Realizaron las Modificaciones";
    $respuestam4->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam4->informe="Se Modificó El Valor Correctamente";
    $respuestam4->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm4 = json_encode($respuestam4);/*se convierte a json*/
echo $rejsonm4;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>