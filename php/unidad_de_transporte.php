<?php
include_once("Maneja_con.php");

class UnidadDeTransporte{


function UnidadDeTransporte(){/*metodo constructor*/

}


function consultarUnidadDeTransporte(){/*consulta la tabla*/
$conect=new ManejaCon;/*objeto de la clase manejacon*/

if ($conect->conectar()==true) {/*si se realiza la conexion*/
	$query="SELECT * FROM unidad_de_transporte order by No_eco";

	$result=@mysql_query($query);
if (!$result) {/*si esta vacio retorna false*/
	return false;
}else{/*si no retorna el resultado de la consulta*/
	return $result;
}

}/*termina if($conect->conectar()==true)*/

}/*termina consultar*/

function consultar_noecoc($noecoc){/*funcion para consultar folio*/
$conect=new ManejaCon;/*se crea un objeto de la clase Manejacon*/

if($conect->conectar()==true){/*El objeto se usa para hacer la conexion*/
$querycvehic="SELECT * FROM unidad_de_transporte WHERE No_eco=$noecoc";/*cuando esta echa la conexion se hace una consulta*/
$resultcvehic=@mysql_query($querycvehic);/*el resultado se guarda en una variable*/

if(!$resultcvehic){/*sie esta vacio retorna false*/
return false;
}else{/*si no retorna el resultado de la consulta*/
  return $resultcvehic;
}
}

}/*fin funcion consultar*/


function insertarUnidadDeTransporte($noeco_vehiculo,$noinv_vehiculo,$localidad_vehiculo,$municipio_vehiculo,$marca_vehiculo,
$tipo_vehiculo,$modelo_vehiculo,$placas_vehiculo,$km_vehiculo,$noid_vehiculo,$nomotor_vehiculo,$nocilintros_vehiculo,$renl_vehiculo,
$aseguradora_vehiculo,$poliza_vehiculo,$exped_vehiculo,$vigencia_vehiculo,$verificacion_vehiculo,$tiposerv_vehiculo,
$edofisico_vehiculo){
$conect=new ManejaCon;

if($conect->conectar()==true){
$query="INSERT INTO unidad_de_transporte values($noeco_vehiculo,'$noinv_vehiculo','$localidad_vehiculo','$municipio_vehiculo','$marca_vehiculo',
'$tipo_vehiculo',$modelo_vehiculo,'$placas_vehiculo',$km_vehiculo,'$noid_vehiculo','$nomotor_vehiculo',$nocilintros_vehiculo,$renl_vehiculo,
'$aseguradora_vehiculo','$poliza_vehiculo','$exped_vehiculo','$vigencia_vehiculo','$verificacion_vehiculo',$tiposerv_vehiculo,
'$edofisico_vehiculo')";
$result=mysql_query($query);
if(!$result){
return false;
}else{
	return true;
}

}/*termina if conexion*/

}/*termina insertar*/

function eliminar($noeco){/*funcion para eliminar folio*/
$conect=new ManejaCon;/*se crea un objeto de la clase Manejacon*/

if($conect->conectar()==true){/*El objeto se usa para hacer la conexion*/
$queryelimveh="DELETE FROM unidad_de_transporte WHERE No_eco=$noeco";/*cuando esta echa la conexion se hace una consulta*/
$resultelimveh=@mysql_query($queryelimveh);/*el resultado se guarda en una variable*/

if(!$resultelimveh){/*sie esta vacio retorna false*/
return false;
}else{/*si no retorna el resultado de la consulta*/
  return true;
}
}

}/*fin funcion eliminar*/



}
?>
