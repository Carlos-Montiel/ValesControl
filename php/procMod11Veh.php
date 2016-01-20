<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod11=strtoupper($_POST["mod11"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam11=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym11="UPDATE unidad_de_transporte SET No_cilintros='$mod11' WHERE No_eco=$idvehic";

    $resultm11=@mysql_query($querym11);

if (!$resultm11) {/*si esta vacio retorna false*/
        $respuestam11->informe="No se Realizaron las Modificaciones";
    $respuestam11->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam11->informe="Se Modificó El Valor Correctamente";
    $respuestam11->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm11 = json_encode($respuestam11);/*se convierte a json*/
echo $rejsonm11;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>