<?php
include_once("Maneja_con.php");
class Reporte{


function Reporte(){/*metodo constructor*/

}



function consultar(){/*funcion para consultar*/
$conect=new ManejaCon;/*se crea un objeto de la clase Manejacon*/

if($conect->conectar()==true){/*El objeto se usa para hacer la conexion*/
$query="SELECT * FROM reporte order by Folio_reporte";/*cuando esta echa la conexion se hace una consulta*/
$resultr=@mysql_query($query);/*el resultado se guarda en una variable*/

if(!$resultr){/*sie esta vacio retorna false*/
return false;
}else{/*si no retorna el resultado de la consulta*/
  return $resultr;
}
}

}/*fin funcion consultar*/


function consultar_folio($folio){/*funcion para consultar folio*/
$conect=new ManejaCon;/*se crea un objeto de la clase Manejacon*/

if($conect->conectar()==true){/*El objeto se usa para hacer la conexion*/
$querycrep="SELECT * FROM reporte WHERE Folio_Reporte=$folio";/*cuando esta echa la conexion se hace una consulta*/
$resultcrep=@mysql_query($querycrep);/*el resultado se guarda en una variable*/

if(!$resultcrep){/*sie esta vacio retorna false*/
return false;
}else{/*si no retorna el resultado de la consulta*/
  return $resultcrep;
}
}

}/*fin funcion consultar*/


function crear($Folio_reporte, $Fecha_realizacion, $Mes, $Anio, $Factura, $No_Eco_U_T, $No_total_vales,
  $Total_recorrido, $Total_importe, $Total_litros, $Observaciones, $Nombre_elaboro, $Nombre_vobo, $Nombre_autorizo){/*sirve para insertar en la base de datos*/

$conect=new ManejaCon;
if($conect->conectar()==true){
$consultafrv = "SELECT * FROM reporte WHERE Folio_reporte = ( SELECT MAX( Folio_reporte ) FROM reporte )";
    $resultfrv = @mysql_query($consultafrv);
    if ($rowfrv = mysql_fetch_array($resultfrv)){ 
$foliofrv= ($rowfrv['Folio_reporte'])+1;
} else { 
	$foliofrv=1;
} 

$query="INSERT INTO reporte values($foliofrv, '$Fecha_realizacion', '$Mes', $Anio, '$Factura', $No_Eco_U_T, $No_total_vales,
  $Total_recorrido, $Total_importe, $Total_litros, '$Observaciones', '$Nombre_elaboro', '$Nombre_vobo', '$Nombre_autorizo')";
$result=mysql_query($query);
if (!$result) {
  return false;
}else{
return true;
}

}
}/*termina funcion crear*/


function eliminar($folio){/*funcion para consultar folio*/
$conect=new ManejaCon;/*se crea un objeto de la clase Manejacon*/

if($conect->conectar()==true){/*El objeto se usa para hacer la conexion*/
$queryelimrep="DELETE FROM reporte WHERE Folio_reporte=$folio";/*cuando esta echa la conexion se hace una consulta*/
$resultelimrep=@mysql_query($queryelimrep);/*el resultado se guarda en una variable*/

if(!$resultelimrep){/*sie esta vacio retorna false*/
return false;
}else{/*si no retorna el resultado de la consulta*/
  return true;
}
}

}/*fin funcion consultar*/


}/*Termina la Clase*/
?>