<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $seltab=$_POST["seltab"];

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestct=new stdClass();


if ($conect->conectar()==true) {/*si se realiza la conexion*/

    $queryc="SELECT * FROM edo_tabla WHERE id_edo=1";

    $resultnt=@mysql_query($queryc);

$rowst=mysql_fetch_array($resultnt);
if ($rowst['activas']=="ACTUAL") {

if ($seltab=="ANTERIOR"){
 $querynt="UPDATE edo_tabla SET activas='ANTERIOR', inactivas='ACTUAL' WHERE id_edo=1";

    $resultnt=@mysql_query($querynt);


if (!$resultnt) {/*si esta vacio retorna false*/
        $respuestct->informe="NO1";
    $respuestct->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestct->informe="Selecciona la Anterior";
    $respuestct->si_no=1;

/*para los recibos*/
$query01="RENAME TABLE recibo TO recibo_temp";
$result01=@mysql_query($query01);
if (!$result01) {/*si esta vacio retorna false*/
        $respuestct->informe01="no renombrada";
    $respuestct->si_no01=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestct->informe01="renombrada";
    $respuestct->si_no01=1;
}

$query02="RENAME TABLE recibo_anterior TO recibo";
$result02=@mysql_query($query02);
if (!$result02) {/*si esta vacio retorna false*/
        $respuestct->informe02="no renombrada02";
    $respuestct->si_no02=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestct->informe02="renombrada02";
    $respuestct->si_no02=1;
}

/*para los vales*/
$query05="RENAME TABLE vales TO vales_temp";
$result05=@mysql_query($query05);
if (!$result05) {/*si esta vacio retorna false*/
        $respuestct->informe05="no renombrada";
    $respuestct->si_no05=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestct->informe05="renombrada";
    $respuestct->si_no05=1;
}

$query06="RENAME TABLE vales_anterior TO vales";
$result06=@mysql_query($query06);
if (!$result06) {/*si esta vacio retorna false*/
        $respuestct->informe06="no renombrada06";
    $respuestct->si_no06=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestct->informe06="renombrada06";
    $respuestct->si_no06=1;
}




}
}else $respuestct->informe="Ya Esta Seleccionada la Tabla ACTUAL";



}else{
  /*para la tabla recibos*/
  if ($seltab=="ACTUAL") {
    $querynt="UPDATE edo_tabla SET activas='ACTUAL', inactivas='ANTERIOR' WHERE id_edo=1";

    $resultnt=@mysql_query($querynt);


if (!$resultnt) {/*si esta vacio retorna false*/
        $respuestct->informe="NO2";
    $respuestct->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestct->informe="Selecciona la Actual";
    $respuestct->si_no=1;
}


/*para los recibos*/
$query03="RENAME TABLE recibo TO recibo_anterior";
$result03=@mysql_query($query03);
if (!$result03) {/*si esta vacio retorna false*/
        $respuestct->informe03="no renombrada";
    $respuestct->si_no03=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestct->informe03="renombrada";
    $respuestct->si_no03=1;
}

$query04="RENAME TABLE recibo_temp TO recibo";
$result04=@mysql_query($query04);
if (!$result04) {/*si esta vacio retorna false*/
        $respuestct->informe04="no renombrada04";
    $respuestct->si_no04=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestct->informe04="renombrada04";
    $respuestct->si_no04=1;
}


/*para los vales*/
$query07="RENAME TABLE vales TO vales_anterior";
$result07=@mysql_query($query07);
if (!$result07) {/*si esta vacio retorna false*/
        $respuestct->informe07="no renombrada";
    $respuestct->si_no07=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestct->informe07="renombrada";
    $respuestct->si_no07=1;
}

$query08="RENAME TABLE vales_temp TO vales";
$result08=@mysql_query($query08);
if (!$result08) {/*si esta vacio retorna false*/
        $respuestct->informe08="no renombrada08";
    $respuestct->si_no08=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestct->informe08="renombrada08";
    $respuestct->si_no08=1;
}








}/*termina condicion actual*/else $respuestct->informe="Ya Esta Seleccionada la Tabla ANTERIOR";
 }

}/*termina if($conect->conectar()==true)*/







$rejsonntt = json_encode($respuestct);/*se convierte a json*/
echo $rejsonntt;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>