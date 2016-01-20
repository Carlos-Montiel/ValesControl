<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod12=strtoupper($_POST["mod12"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam12=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym12="UPDATE unidad_de_transporte SET Rendimiento_p_litro='$mod12' WHERE No_eco=$idvehic";

    $resultm12=@mysql_query($querym12);

if (!$resultm12) {/*si esta vacio retorna false*/
        $respuestam12->informe="No se Realizaron las Modificaciones";
    $respuestam12->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam12->informe="Se Modificó El Valor Correctamente";
    $respuestam12->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm12 = json_encode($respuestam12);/*se convierte a json*/
echo $rejsonm12;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>