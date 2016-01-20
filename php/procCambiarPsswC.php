<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $contracam=$_POST["contracam"];

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestacpcc=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querycpc="UPDATE usuarios SET contrasenia_usuario=$contracam WHERE id_usuario=1 AND nombre_usuario='ADMINISTRADOR'";

    $resultcpc=@mysql_query($querycpc);

if (!$resultcpc) {/*si esta vacio retorna false*/
        $respuestacpcc->informe="No Se Modificó La Contraseña Correctamente<br>Vuelve a Intentarlo";
    $respuestacpcc->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestacpcc->informe="Se Modificó La Contraseña Correctamente";
    $respuestacpcc->si_no=1;
}

}/*termina if($conect->conectar()==true)*/




$rejsoncpc = json_encode($respuestacpcc);/*se convierte a json*/
echo $rejsoncpc;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>