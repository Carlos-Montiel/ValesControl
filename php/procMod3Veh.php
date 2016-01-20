<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod3=strtoupper($_POST["mod3"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam3=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym3="UPDATE unidad_de_transporte SET Municipio='$mod3' WHERE No_eco=$idvehic";

    $resultm3=@mysql_query($querym3);

if (!$resultm3) {/*si esta vacio retorna false*/
        $respuestam3->informe="No se Realizaron las Modificaciones";
    $respuestam3->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam3->informe="Se Modificó El Valor Correctamente";
    $respuestam3->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm3 = json_encode($respuestam3);/*se convierte a json*/
echo $rejsonm3;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>