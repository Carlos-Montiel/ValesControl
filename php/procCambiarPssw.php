<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $contraseñapCambiar=$_POST["contraseñapCambiar"];

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestacpc=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $querycp="SELECT * FROM usuarios WHERE id_usuario=1 AND contrasenia_usuario=$contraseñapCambiar";

    $resultcp=@mysql_query($querycp);

if ($row=mysql_fetch_array($resultcp)) {/*si esta vacio retorna false*/
    $respuestacpc->informe="Bien";
    $respuestacpc->si_no=1;
}else{/*si no retorna el resultado de la consulta*/
    $respuestacpc->informe="Contraseña Incorrecta";
    $respuestacpc->si_no=0;
}

}/*termina if($conect->conectar()==true)*/




$rejsoncpc = json_encode($respuestacpc);/*se convierte a json*/
echo $rejsoncpc;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>