<?php
include_once("Maneja_con.php");
class Vale{


function Vale(){/*metodo constructor*/

}



function consultar(){/*funcion para consultar*/
$conect=new ManejaCon;/*se crea un objeto de la clase Manejacon*/

if($conect->conectar()==true){/*El objeto se usa para hacer la conexion*/
$query="SELECT * FROM vales order by No_vale";/*cuando esta echa la conexion se hace una consulta*/
$resultv=@mysql_query($query);/*el resultado se guarda en una variable*/

if(!$resultv){/*sie esta vacio retorna false*/
return false;
}else{/*si no retorna el resultado de la consulta*/
  return $resultv;
}
}

}/*fin funcion consultar*/


function consultar_anionum($anio, $num){/*funcion para consultar folio*/
$conect=new ManejaCon;/*se crea un objeto de la clase Manejacon*/

if($conect->conectar()==true){/*El objeto se usa para hacer la conexion*/
$querycvalan="SELECT * FROM vales WHERE No_vale=$num AND Anio_f_v=$anio";/*cuando esta echa la conexion se hace una consulta*/
$resultcvalan=@mysql_query($querycvalan);/*el resultado se guarda en una variable*/

if(!$resultcvalan){/*sie esta vacio retorna false*/
return false;
}else{/*si no retorna el resultado de la consulta*/
  return $resultcvalan;
}
}

}/*fin funcion consultar*/

function crear($no_vale,$f_dia_vale,$f_mes_vale,$f_anio_vale,$noeco_vale,$kinicial_vale,$kfinal_vale,$ecorridoaprox_vale,$ofcom_vale,$monto_vale,$litros_vale,$preciogas_vale,$consumopl_vale,$renpl_vale,$dde_vale,$da_vale,$conductor_vale){/*sirve para insertar en la base de datos*/

$conect=new ManejaCon;
if($conect->conectar()==true){
$query="INSERT INTO vales values($no_vale,$f_dia_vale,'$f_mes_vale',$f_anio_vale,$noeco_vale,$kinicial_vale,$kfinal_vale,$ecorridoaprox_vale,$ofcom_vale,$monto_vale,$litros_vale,$preciogas_vale,$consumopl_vale,$renpl_vale,'$dde_vale','$da_vale','$conductor_vale')";
$result=mysql_query($query);
if (!$result) {
  return false;
}else{
return true;
}

}
}/*termina funcion crear*/


function eliminar($folio){/*funcion para eliminar folio*/
$conect=new ManejaCon;/*se crea un objeto de la clase Manejacon*/

if($conect->conectar()==true){/*El objeto se usa para hacer la conexion*/
$queryelimval="DELETE FROM vales WHERE No_vale=$folio";/*cuando esta echa la conexion se hace una consulta*/
$resultelimval=@mysql_query($queryelimval);/*el resultado se guarda en una variable*/

if(!$resultelimval){/*sie esta vacio retorna false*/
return false;
}else{/*si no retorna el resultado de la consulta*/
  return true;
}
}

}/*fin funcion eliminar*/


}/*Termina la Clase*/
?>