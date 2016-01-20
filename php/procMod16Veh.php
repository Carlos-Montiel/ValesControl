<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod16=strtoupper($_POST["mod16"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam16=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym16="UPDATE unidad_de_transporte SET Vigencia='$mod16' WHERE No_eco=$idvehic";

    $resultm16=@mysql_query($querym16);

if (!$resultm16) {/*si esta vacio retorna false*/
        $respuestam16->informe="No se Realizaron las Modificaciones";
    $respuestam16->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam16->informe="Se Modificó El Valor Correctamente";
    $respuestam16->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm16 = json_encode($respuestam16);/*se convierte a json*/
echo $rejsonm16;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>