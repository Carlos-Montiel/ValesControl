<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $noinvcmbr=strtoupper($_POST["noinvcmbr"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam1=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym1="UPDATE unidad_de_transporte SET No_inventario='$noinvcmbr' WHERE No_eco=$idvehic";

    $resultm1=@mysql_query($querym1);

if (!$resultm1) {/*si esta vacio retorna false*/
        $respuestam1->informe="No se Realizaron las Modificaciones";
    $respuestam1->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam1->informe="Se Modificó El Valor Correctamente";
    $respuestam1->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm1 = json_encode($respuestam1);/*se convierte a json*/
echo $rejsonm1;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>