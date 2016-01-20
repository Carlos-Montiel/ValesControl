<?php
include_once("Maneja_con.php");

/*recibimos las variables post*/
  $anio_tabla=$_POST["anio_tabla"];

  $conect=new ManejaCon;/*objeto de la clase manejacon*/

$respuestant=new stdClass();

if ($conect->conectar()==true) {/*si se realiza la conexion*/
	/*para la tabla recibos*/
	$queryelimina="DROP TABLE recibo_anterior";
    $querynt="RENAME TABLE recibo TO recibo_anterior";
$queryntcrea="CREATE TABLE IF NOT EXISTS `recibo` (
  `Folio_recibo` int(5) NOT NULL COMMENT 'Guarda el folio identificador de cada recibo almacenado.',
  `F_dia` int(2) NOT NULL COMMENT 'Almacena el día de la realización del recibo.',
  `F_mes` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el mes en que se realizo el recibo (con letras).',
  `F_anio` int(4) NOT NULL COMMENT 'Almacena el año de la realización del recibo.',
  `Area_solicitante` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda el área de la empresa que solicita el vale ej. ADMINISTRATIVA.',
  `No_eco_U_T` int(5) NOT NULL COMMENT 'Guarda el identificador del vehículo a usar.',
  `No_oficio_comision` int(5) NOT NULL COMMENT 'Guarda el número de oficio de comisión del vale.',
  `No_vale` int(5) NOT NULL COMMENT 'Campo que almacena el identificador del vale al que corresponde el recibo depende de la tabla Vales.',
  `Destino` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda el lugar destino del vehículo a usar.',
  `Recorrido_aprox` double(5,2) NOT NULL COMMENT 'Almacena el recorrido aproximado a realizar.',
  `Monto_numero` double(10,2) NOT NULL COMMENT 'Campo que almacena el monto ($) del recibo con número.',
  `Monto_letra` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Campo que almacena el monto ($) del recibo con letra.',
  `Litros` double(10,2) NOT NULL COMMENT 'Guarda los litros de gasolina aproximados calculados con el monto y el precio.',
  `Nombre_recibi` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el nombre que aparece en el recibo para imprimir para firma de recibí.',
  `Nombre_vo.bo` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el nombre que aparece en el recibo para imprimir para firma de Vo.Bo.',
  `Nombre_autorizo` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el nombre que aparece en el recibo para imprimir para firma de autorizo.',
  PRIMARY KEY (`Folio_recibo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='En esta tabla se guardan los datos de los recibos hechos para los vales.';
";
    $resultelimina=@mysql_query($queryelimina);
    $resultnt=@mysql_query($querynt);
    $resultntcrea=@mysql_query($queryntcrea);

if (!$resultelimina || !$resultnt|| !$resultntcrea ) {/*si esta vacio retorna false*/
        $respuestant->informe="NO Se Crearon las Nuevas Tablas Correctamente";
    $respuestant->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestant->informe="Se Crearon las Nuevas Tablas Correctamente";
    $respuestant->si_no=1;
}

/*para la tabla vales*/
$queryeliminavales="DROP TABLE vales_anterior";
    $queryntvales="RENAME TABLE vales TO vales_anterior";
$queryntcreavales="CREATE TABLE IF NOT EXISTS `vales` (
  `No_vale` int(5) NOT NULL COMMENT 'Campo que almacena el valor único de cada vale para identificarlo.',
  `Dia_f_v` int(2) NOT NULL COMMENT 'Guarda el día en que se realizo el vale.',
  `Mes_f_v` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda el mes en que se realizo el vale con letras.',
  `Anio_f_v` int(4) NOT NULL COMMENT 'Almacena el año de realización del vale.',
  `No_eco_U_T` int(5) NOT NULL COMMENT 'Guarda el identificador del vehículo para el que se realizo el vale depende de la tabla Unidad_de_transporte.',
  `K_inicial` int(10) NOT NULL COMMENT 'Almacena el kilometraje inicial del vehículo al momento de la realización del vale.',
  `K_final` int(10) NOT NULL COMMENT 'Almacena el kilometraje que tendrá el vehículo después del viaje Calculado con el K_inicial mas el Recorrido_aprox.',
  `Recorrido_aprox` double(5,2) NOT NULL COMMENT 'Guarda el recorrido aproximado que realizara el vehículo según el Destino asignado.',
  `No_oficio_comision` int(5) NOT NULL COMMENT 'Guarda el número de oficio de comisión del vale.',
  `C_C_Monto` double(10,2) NOT NULL COMMENT 'Almacena la cantidad de dinero por la que se realizo el vale.',
  `C_C_Litros_aprox` double(10,2) NOT NULL COMMENT 'Guarda la cantidad de litros de gasolina aproximados según el monto asignado y el precio actual de la gasolina.',
  `Precio_gasolina` double(10,2) NOT NULL COMMENT 'Guarda el precio del litro de gasolina al momento de la realización del vale.',
  `Consumo_p_litro` double(10,2) NOT NULL COMMENT 'Guarda el monto en pesos consumido por litro de gasolina Precio del litro.',
  `Rendimiento_p_litro` int(5) NOT NULL COMMENT 'Guarda el rendimiento que tiene el vehículo usado por cada litro de gasolina KM/LT.',
  `D_de` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el lugar de salida del vehículo a usar.',
  `D_a` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el lugar destino del vehículo.',
  `Conductor` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda el nombre del conductor que va a usar el vehículo.',
  PRIMARY KEY (`No_vale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='En la tabla Vales se guardan los datos de cada vale otorgado al personal.';
";
    $resulteliminavales=@mysql_query($queryeliminavales);
    $resultntvales=@mysql_query($queryntvales);
    $resultntcreavales=@mysql_query($queryntcreavales);

if (!$resultelimina || !$resultntvales|| !$resultntcreavales ) {/*si esta vacio retorna false*/
        $respuestant->informe="NO Se Crearon las Nuevas Tablas Correctamente";
    $respuestant->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
    $respuestant->informe="Se Crearon las Nuevas Tablas Correctamente<br>";
    $respuestant->si_no=1;
}


}/*termina if($conect->conectar()==true)*/




$rejsonntt = json_encode($respuestant);/*se convierte a json*/
echo $rejsonntt;/*se imprime la variable json que contiene la consulta de la tabla y el informe separados en variablaes*/
?>