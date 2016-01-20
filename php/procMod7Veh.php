<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $idvehic=$_POST["idvehic"];
  $mod7=strtoupper($_POST["mod7"]);

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestam7=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querym7="UPDATE unidad_de_transporte SET Placas='$mod7' WHERE No_eco=$idvehic";

    $resultm7=@mysql_query($querym7);

if (!$resultm7) {/*si esta vacio retorna false*/
        $respuestam7->informe="No se Realizaron las Modificaciones";
    $respuestam7->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestam7->informe="Se Modificó El Valor Correctamente";
    $respuestam7->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsonm7 = json_encode($respuestam7);/*se convierte a json*/
echo $rejsonm7;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>