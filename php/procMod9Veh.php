<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod9=strtoupper($_POST["mod9"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam9=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym9="UPDATE unidad_de_transporte SET No_identificacion_vehicular='$mod9' WHERE No_eco=$idvehic";

    $resultm9=@mysql_query($querym9);

if (!$resultm9) {/*si esta vacio retorna false*/
        $respuestam9->informe="No se Realizaron las Modificaciones";
    $respuestam9->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam9->informe="Se Modificó El Valor Correctamente";
    $respuestam9->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm9 = json_encode($respuestam9);/*se convierte a json*/
echo $rejsonm9;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>