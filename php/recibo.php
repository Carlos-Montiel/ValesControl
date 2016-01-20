<?php
include_once("Maneja_con.php");
class Recibo{

function Recibo(){/*metodo constructor*/

}

function consultar(){/*funcion para consultar*/
$conect=new ManejaCon;/*se crea un objeto de la clase Manejacon*/

if($conect->conectar()==true){/*El objeto se usa para hacer la conexion*/
$query="SELECT * FROM recibo order by Folio_recibo";/*cuando esta echa la conexion se hace una consulta*/
$result=@mysql_query($query);/*el resultado se guarda en una variable*/

if(!$result){/*sie esta vacio retorna false*/
return false;
}else{/*si no retorna el resultado de la consulta*/
  return $result;
}
}

}/*fin funcion consultar*/


function consultar_aniofolio($anio, $folio){/*funcion para consultar folio*/
$conect=new ManejaCon;/*se crea un objeto de la clase Manejacon*/

if($conect->conectar()==true){/*El objeto se usa para hacer la conexion*/
$querycrepaf="SELECT * FROM recibo WHERE Folio_recibo=$folio AND F_anio=$anio";/*cuando esta echa la conexion se hace una consulta*/
$resultcrepaf=@mysql_query($querycrepaf);/*el resultado se guarda en una variable*/

if(!$resultcrepaf){/*sie esta vacio retorna false*/
return false;
}else{/*si no retorna el resultado de la consulta*/
  return $resultcrepaf;
}
}

}/*fin funcion consultar*/


function crear($folioRecibo,$fechaDia,$fechaMes,$fechaAnio,$AreaSolicitante,$noEcoUT,$noOficioComision,$noVale,$recorridoAprox,$montoNumero,
  $montoLetra,$litros,$nombreRecibi,$nombreVoBo,$nombreAutorizo,$destino){/*sirve para insertar en la base de datos*/

$conect=new ManejaCon;
if($conect->conectar()==true){
$query="INSERT INTO recibo values($folioRecibo,$fechaDia,'$fechaMes',$fechaAnio,'$AreaSolicitante',$noEcoUT,$noOficioComision,$noVale,
  '$destino',$recorridoAprox,$montoNumero,'$montoLetra',$litros,'$nombreRecibi','$nombreVoBo','$nombreAutorizo')";
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
/*Reduce kilometraje*/
$queryc1="SELECT * FROM recibo WHERE Folio_recibo=$folio";/*cuando esta echa la conexion se hace una consulta*/
$resultc1=@mysql_query($queryc1);

if(!$resultc1){/*sie esta vacio retorna false*/
return false;
}else{/*si no retorna el resultado de la consulta*/
 
$rowc1=mysql_fetch_array($resultc1);
$km=$rowc1['Recorrido_aprox'];
$ut=$rowc1['No_eco_U_T'];

$queryc2="SELECT * FROM unidad_de_transporte WHERE No_eco=$ut";/*cuando esta echa la conexion se hace una consulta*/
$resultc2=@mysql_query($queryc2);
$rowc2=mysql_fetch_array($resultc2);
$km1=$rowc2['Kilometraje'];

$reskm=$km1-$km;

$queryc3="UPDATE unidad_de_transporte SET Kilometraje=$reskm WHERE No_eco=$ut";/*cuando esta echa la conexion se hace una consulta*/
$resultc3=@mysql_query($queryc3);


$queryelimrec="DELETE FROM recibo WHERE Folio_recibo=$folio";/*cuando esta echa la conexion se hace una consulta*/
$resultelimrec=@mysql_query($queryelimrec);/*el resultado se guarda en una variable*/

if(!$resultelimrec){/*sie esta vacio retorna false*/
return false;
}else{/*si no retorna el resultado de la consulta*/
  return true;
}

}
}/*termina el conect*/



}/*fin funcion eliminar*/



}/*Termina la Clase*/
?>


