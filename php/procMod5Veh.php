<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod5=strtoupper($_POST["mod5"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam5=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym5="UPDATE unidad_de_transporte SET Tipo='$mod5' WHERE No_eco=$idvehic";

    $resultm5=@mysql_query($querym5);

if (!$resultm5) {/*si esta vacio retorna false*/
        $respuestam5->informe="No se Realizaron las Modificaciones";
    $respuestam5->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam5->informe="Se Modificó El Valor Correctamente";
    $respuestam5->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm5 = json_encode($respuestam5);/*se convierte a json*/
echo $rejsonm5;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>