<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $seltab=$_POST["val"];

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestct=new stdClass();


if ($conect->conectar()==true) {/*si se realiza la conexion*/

    
 $querynt="SELECT * FROM edo_tabla WHERE id_edo=1";

    $resultnt=@mysql_query($querynt);

$rowst=mysql_fetch_array($resultnt);
if (!$resultnt) {/*si esta vacio retorna false*/
        $respuestct->informe="NO1";
    $respuestct->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestct->informe=$rowst['activas'];
    $respuestct->si_no=1; 
}



}/*termina if($conect->conectar()==true)*/







$rejsonntt = json_encode($respuestct);/*se convierte a json*/
echo $rejsonntt;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>