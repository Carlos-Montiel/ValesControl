<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod8=strtoupper($_POST["mod8"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam8=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym8="UPDATE unidad_de_transporte SET Kilometraje='$mod8' WHERE No_eco=$idvehic";

    $resultm8=@mysql_query($querym8);

if (!$resultm8) {/*si esta vacio retorna false*/
        $respuestam8->informe="No se Realizaron las Modificaciones";
    $respuestam8->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam8->informe="Se Modificó El Valor Correctamente";
    $respuestam8->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm8 = json_encode($respuestam8);/*se convierte a json*/
echo $rejsonm8;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>