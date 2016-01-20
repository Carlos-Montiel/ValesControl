<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod18=strtoupper($_POST["mod18"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam18=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym18="UPDATE unidad_de_transporte SET Numero_tipo_de_servicio='$mod18' WHERE No_eco=$idvehic";

    $resultm18=@mysql_query($querym18);

if (!$resultm18) {/*si esta vacio retorna false*/
        $respuestam18->informe="No se Realizaron las Modificaciones";
    $respuestam18->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam18->informe="Se Modificó El Valor Correctamente";
    $respuestam18->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm18 = json_encode($respuestam18);/*se convierte a json*/
echo $rejsonm18;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>