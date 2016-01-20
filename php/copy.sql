-- MySQL dump 10.13  Distrib 5.5.27, for Win32 (x86)
--
-- Host: localhost    Database: control_de_vales
-- ------------------------------------------------------
-- Server version	5.5.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `edo_tabla`
--

DROP TABLE IF EXISTS `edo_tabla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edo_tabla` (
  `id_edo` int(5) NOT NULL AUTO_INCREMENT,
  `activas` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `inactivas` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_edo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edo_tabla`
--

LOCK TABLES `edo_tabla` WRITE;
/*!40000 ALTER TABLE `edo_tabla` DISABLE KEYS */;
INSERT INTO `edo_tabla` VALUES (1,'ACTUAL','ANTERIOR');
/*!40000 ALTER TABLE `edo_tabla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `precio_gas`
--

DROP TABLE IF EXISTS `precio_gas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `precio_gas` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Anio` int(4) NOT NULL,
  `Mes` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Precio` double(4,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Guarda el precio de la gasolina por mes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `precio_gas`
--

LOCK TABLES `precio_gas` WRITE;
/*!40000 ALTER TABLE `precio_gas` DISABLE KEYS */;
INSERT INTO `precio_gas` VALUES (1,2014,'Junio',12.77),(2,2014,'Julio',12.86),(5,2014,'Agosto',12.86);
/*!40000 ALTER TABLE `precio_gas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recibo`
--

DROP TABLE IF EXISTS `recibo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recibo` (
  `Folio_recibo` int(5) NOT NULL COMMENT 'Guarda el folio identificador de cada recibo almacenado.',
  `F_dia` int(2) NOT NULL COMMENT 'Almacena el dÃ­a de la realizaciÃ³n del recibo.',
  `F_mes` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el mes en que se realizo el recibo (con letras).',
  `F_anio` int(4) NOT NULL COMMENT 'Almacena el aÃ±o de la realizaciÃ³n del recibo.',
  `Area_solicitante` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda el Ã¡rea de la empresa que solicita el vale ej. ADMINISTRATIVA.',
  `No_eco_U_T` int(5) NOT NULL COMMENT 'Guarda el identificador del vehÃ­culo a usar.',
  `No_oficio_comision` int(5) NOT NULL COMMENT 'Guarda el nÃºmero de oficio de comisiÃ³n del vale.',
  `No_vale` int(5) NOT NULL COMMENT 'Campo que almacena el identificador del vale al que corresponde el recibo depende de la tabla Vales.',
  `Destino` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda el lugar destino del vehÃ­culo a usar.',
  `Recorrido_aprox` double(5,2) NOT NULL COMMENT 'Almacena el recorrido aproximado a realizar.',
  `Monto_numero` double(10,2) NOT NULL COMMENT 'Campo que almacena el monto ($) del recibo con nÃºmero.',
  `Monto_letra` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Campo que almacena el monto ($) del recibo con letra.',
  `Litros` double(10,2) NOT NULL COMMENT 'Guarda los litros de gasolina aproximados calculados con el monto y el precio.',
  `Nombre_recibi` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el nombre que aparece en el recibo para imprimir para firma de recibÃ­.',
  `Nombre_vo.bo` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el nombre que aparece en el recibo para imprimir para firma de Vo.Bo.',
  `Nombre_autorizo` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el nombre que aparece en el recibo para imprimir para firma de autorizo.',
  PRIMARY KEY (`Folio_recibo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='En esta tabla se guardan los datos de los recibos hechos para los vales.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recibo`
--

LOCK TABLES `recibo` WRITE;
/*!40000 ALTER TABLE `recibo` DISABLE KEYS */;
INSERT INTO `recibo` VALUES (448,30,'JUNIO',2014,'MEDICA',613,1286,448,'MOLANGO',46.99,100.00,'(CIEN PESOS 00/100 M.N.)',7.83,'ING.JUAN PEDRO ZERON ARTEAGA','L.C. LEOCADIA HERNANDEZ HDEZ','DR.B. GERARDO VIVANCO CORTEZ');
/*!40000 ALTER TABLE `recibo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recibo_anterior`
--

DROP TABLE IF EXISTS `recibo_anterior`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recibo_anterior` (
  `Folio_recibo` int(5) NOT NULL COMMENT 'Guarda el folio identificador de cada recibo almacenado.',
  `F_dia` int(2) NOT NULL COMMENT 'Almacena el dÃ­a de la realizaciÃ³n del recibo.',
  `F_mes` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el mes en que se realizo el recibo (con letras).',
  `F_anio` int(4) NOT NULL COMMENT 'Almacena el aÃ±o de la realizaciÃ³n del recibo.',
  `Area_solicitante` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda el Ã¡rea de la empresa que solicita el vale ej. ADMINISTRATIVA.',
  `No_eco_U_T` int(5) NOT NULL COMMENT 'Guarda el identificador del vehÃ­culo a usar.',
  `No_oficio_comision` int(5) NOT NULL COMMENT 'Guarda el nÃºmero de oficio de comisiÃ³n del vale.',
  `No_vale` int(5) NOT NULL COMMENT 'Campo que almacena el identificador del vale al que corresponde el recibo depende de la tabla Vales.',
  `Destino` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda el lugar destino del vehÃ­culo a usar.',
  `Recorrido_aprox` double(5,2) NOT NULL COMMENT 'Almacena el recorrido aproximado a realizar.',
  `Monto_numero` double(10,2) NOT NULL COMMENT 'Campo que almacena el monto ($) del recibo con nÃºmero.',
  `Monto_letra` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Campo que almacena el monto ($) del recibo con letra.',
  `Litros` double(10,2) NOT NULL COMMENT 'Guarda los litros de gasolina aproximados calculados con el monto y el precio.',
  `Nombre_recibi` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el nombre que aparece en el recibo para imprimir para firma de recibÃ­.',
  `Nombre_vo.bo` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el nombre que aparece en el recibo para imprimir para firma de Vo.Bo.',
  `Nombre_autorizo` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el nombre que aparece en el recibo para imprimir para firma de autorizo.',
  PRIMARY KEY (`Folio_recibo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='En esta tabla se guardan los datos de los recibos hechos para los vales.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recibo_anterior`
--

LOCK TABLES `recibo_anterior` WRITE;
/*!40000 ALTER TABLE `recibo_anterior` DISABLE KEYS */;
/*!40000 ALTER TABLE `recibo_anterior` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reporte`
--

DROP TABLE IF EXISTS `reporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reporte` (
  `Folio_reporte` int(5) NOT NULL COMMENT 'Almacena el folio único identificador de cada reporte.',
  `Fecha_realizacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Campo que guarda la fecha de la realización del reporte.',
  `Mes` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda el mes del que se esta haciendo el reporte.',
  `Anio` int(4) NOT NULL COMMENT 'Guarda el año del que se esta haciendo el reporte.',
  `Factura` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el número de la factura.',
  `No_eco_U_T` int(5) NOT NULL COMMENT 'Guarda el identificador del vehículo del que se realiza el reporte depende de la tabla "Unidad_de_transporte".',
  `No_total_vales` int(5) NOT NULL COMMENT 'Campo que guarda el número total de vales con los que cuenta el reporte.',
  `Total_recorrido` int(10) NOT NULL COMMENT 'Guarda el total de km. recorridos, se obtiene al sumar todos los valores del campo "Recorrido_aprox" de los vales contenidos en el reporte.',
  `Total_importe` double(10,2) NOT NULL COMMENT 'Guarda el total del importe ($), se obtiene al sumar todos los valores del campo "Monto" de los vales contenidos en el reporte.',
  `Total_litros` double(10,2) NOT NULL COMMENT 'Guarda el total de litros de gasolina, se obtiene al sumar todos los valores del campo "Litros_aprox" de los vales contenidos en el reporte.',
  `Observaciones` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Guarda las observaciones hechas al hacer el reporte.',
  `Nombre_elaboro` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el nombre que aparece en el reporte para imprimir para firma de elaboro.',
  `Nombre_vobo` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el nombre que aparece en el reporte para imprimir para firma de Vo.Bo.',
  `Nombre_autorizo` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el nombre que aparece en el reporte para imprimir para firma de autorizo.',
  PRIMARY KEY (`Folio_reporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Esta tabla almacena los datos y detalles de cada reporte que se realiza.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reporte`
--

LOCK TABLES `reporte` WRITE;
/*!40000 ALTER TABLE `reporte` DISABLE KEYS */;
INSERT INTO `reporte` VALUES (1,'Lunes,  11 de Agosto de 2014','JUNIO',2014,'34',613,1,47,100.00,7.83,'','ING. JUAN PEDRO ZERON ARTEAGA','L.C. LEOCADIA HERNANDEZ HDEZ','DR. B. GERARDO VIVANCO CORTEZ'),(2,'Lunes,  11 de Agosto de 2014','JUNIO',2014,'2',613,1,47,100.00,7.83,'','ING. JUAN PEDRO ZERON ARTEAGA','L.C. LEOCADIA HERNANDEZ HDEZ','DR. B. GERARDO VIVANCO CORTEZ'),(3,'Lunes,  11 de Agosto de 2014','JUNIO',2014,'1',613,1,47,100.00,7.83,'','ING. JUAN PEDRO ZERON ARTEAGA','L.C. LEOCADIA HERNANDEZ HDEZ','DR. B. GERARDO VIVANCO CORTEZ'),(4,'Lunes,  11 de Agosto de 2014','JUNIO',2014,'3',613,1,47,100.00,7.83,'','ING. JUAN PEDRO ZERON ARTEAGA','L.C. LEOCADIA HERNANDEZ HDEZ','DR. B. GERARDO VIVANCO CORTEZ'),(5,'Lunes,  11 de Agosto de 2014','MAYO',2014,'1',613,0,0,0.00,0.00,'','ING. JUAN PEDRO ZERON ARTEAGA','L.C. LEOCADIA HERNANDEZ HDEZ','DR. B. GERARDO VIVANCO CORTEZ'),(6,'Lunes,  11 de Agosto de 2014','JUNIO',2014,'1',613,1,47,100.00,7.83,'','ING. JUAN PEDRO ZERON ARTEAGA','L.C. LEOCADIA HERNANDEZ HDEZ','DR. B. GERARDO VIVANCO CORTEZ'),(7,'Lunes,  11 de Agosto de 2014','JUNIO',2014,'1',613,1,47,100.00,7.83,'','ING. JUAN PEDRO ZERON ARTEAGA','L.C. LEOCADIA HERNANDEZ HDEZ','DR. B. GERARDO VIVANCO CORTEZ'),(8,'Lunes,  11 de Agosto de 2014','JUNIO',2014,'1',613,1,47,100.00,7.83,'','ING. JUAN PEDRO ZERON ARTEAGA','L.C. LEOCADIA HERNANDEZ HDEZ','DR. B. GERARDO VIVANCO CORTEZ'),(9,'Lunes,  11 de Agosto de 2014','JUNIO',2014,'1',613,1,47,100.00,7.83,'','ING. JUAN PEDRO ZERON ARTEAGA','L.C. LEOCADIA HERNANDEZ HDEZ','DR. B. GERARDO VIVANCO CORTEZ'),(10,'Lunes,  11 de Agosto de 2014','JUNIO',2014,'1',613,1,47,100.00,7.83,'','ING. JUAN PEDRO ZERON ARTEAGA','L.C. LEOCADIA HERNANDEZ HDEZ','DR. B. GERARDO VIVANCO CORTEZ'),(11,'Martes,  12 de Agosto de 2014','JUNIO',2014,'1',613,1,47,100.00,7.83,'','ING. JUAN PEDRO ZERON ARTEAGA','L.C. LEOCADIA HERNANDEZ HDEZ','DR. B. GERARDO VIVANCO CORTEZ');
/*!40000 ALTER TABLE `reporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_de_servicio`
--

DROP TABLE IF EXISTS `tipo_de_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_de_servicio` (
  `Numero` int(3) NOT NULL COMMENT 'Almacena el número identificador único de cada tipo de servicio de la tabla.',
  `Tipo` varchar(80) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda la descripción del tipo de servicio que ofrece la unidad de transporte.',
  PRIMARY KEY (`Numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='En esta tabla se almacenan los tipos de servicio existentes que corresponden a l';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_de_servicio`
--

LOCK TABLES `tipo_de_servicio` WRITE;
/*!40000 ALTER TABLE `tipo_de_servicio` DISABLE KEYS */;
INSERT INTO `tipo_de_servicio` VALUES (1,'AMBULANCIA'),(2,'VEHICULO DE ABASTO DE ALMACEN Y MATERIAL DE CONSUMO'),(3,'VEHICULO DE ABASTO DE OBRAS CONSERVACION Y MANTENIMEIENTO'),(4,'VEHICULO DE TRANSPORTE DE PERSONAL MEDICO Y PARAMEDICO'),(5,'VEHICULOS DE SUPERVISION DE PROGRAMAS DE SALUD '),(6,'VEHICULO DE SUPERVISION DE OBRAS DE CONSERVACION Y MANTENIMIENTO'),(7,'VEHICULO DE PERSONAL DIRECTIVO');
/*!40000 ALTER TABLE `tipo_de_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_de_transporte`
--

DROP TABLE IF EXISTS `unidad_de_transporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_de_transporte` (
  `No_eco` int(5) NOT NULL COMMENT 'Campo que almacena el identificador de cada vehículo. ',
  `No_inventario` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el número de inventario que corresponde a cada vehículo registrado.',
  `Localidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda la localidad a la que pertenece el vehículo.',
  `Municipio` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Campo que almacena el municipio al que corresponde el vehículo.',
  `Marca` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena la marca de la unidad de transporte.',
  `Tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda el tipo del vehículo ej. "Pick-up".',
  `Modelo` int(5) NOT NULL COMMENT 'Campo que guarda el año del modelo correspondiente a la unidad.',
  `Placas` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'En este campo se almacena el número de placas de la unidad de transporte.',
  `Kilometraje` int(10) NOT NULL COMMENT 'Guarda el kilometraje con el que cuenta el vehículo hasta el momento, se modifica con el uso.',
  `No_identificacion_vehicular` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el numero de identificación vehicular único en cada vehículo.',
  `No_motor` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda el número de motor correspondiente al vehículo.',
  `No_cilintros` int(2) NOT NULL COMMENT 'Almacena el número de cilindros del vehículo según corresponda. ',
  `Rendimiento_p_litro` int(5) NOT NULL COMMENT 'Guarda el rendimiento que tiene el vehículo por cada litro de gasolina (km/lt).',
  `Aseguradora` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda el nombre de la aseguradora a la que esta registrada la unidad de transporte.',
  `Poliza` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el número de la póliza de seguros.',
  `Exped` date NOT NULL COMMENT 'Almacena la fecha de expedición de la póliza de seguros.',
  `Vigencia` date NOT NULL COMMENT 'Guarda la fecha de vencimiento de la  póliza de seguros de la unidad.',
  `Verificacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Campo que guarda el mes y el año de la última verificación realizada al vehículo.',
  `Numero_tipo_de_servicio` int(3) NOT NULL COMMENT 'Guarda el número del tipo de servicio que ofrece la unidad dependiendo de la tabla "Tipo de Servicio".',
  `Estado_fisico` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena una descripción breve del estado de la unidad de transporte ej. "REGULAR".',
  PRIMARY KEY (`No_eco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='En esta tabla se almacenan todas las unidades de transporte con las que cuenta l';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_de_transporte`
--

LOCK TABLES `unidad_de_transporte` WRITE;
/*!40000 ALTER TABLE `unidad_de_transporte` DISABLE KEYS */;
INSERT INTO `unidad_de_transporte` VALUES (250,'I4080800052-108','XOCHICOATLAN','XOCHICOATLAN','NISSAN','PICK-UP',1991,'HH71515',0,'172006179','M8Y1F0508',4,6,'ZURICH','696207-18','2013-01-01','2013-09-30','2014-07',5,'REGULAR'),(294,'I4080800072-45','JURISDICCIÃ³N','ZACUALTIPÃ¡N','CHEVROLET','PANEL',1991,'HH46428',5893,'3GCEC20T6MM145422','MM145422',6,5,'ZURICH','742958-43','2013-10-01','2014-09-30','2014-02',2,'REGULAR'),(424,'I4080800052-76','XOCHICOATLAN','XOCHICOATLAN','FORD','PICK-UP',1997,'HH46433',197415,'3FTEF25N8VMA46524','V17920',8,4,'ZURICH','742958-117','2013-10-01','2014-09-30','2014-03',5,'REGULAR'),(522,'I480800052-143','TIANGUISTENGO','TIANGUISTENGO','DODGE','PICK-UP',1999,'HH46497',3754,'3B7JC26Y7XM593755','1801B3PN',8,4,'ZURICH','742958-179','2013-10-01','2014-09-30','2014-02',5,'REGULAR'),(597,'I480800052-143','JURISDICCIÃ³N','ZACUALTIPÃ¡N','FORD','PICK-UP',2003,'HMS2271',390906,'8AFDT50D936279709','HECHO EN MEX.',4,6,'ZURICH','742958214','2013-10-01','2014-09-30','2014-04',6,'REGULAR'),(599,'I4080800052-144','JURISDICCIÃ³N','ZACUALTIPÃ¡N','FORD','PICK-UP',2003,'HMX7005',213486,'3FTEF17253MB12697','HECHO EN MEX.',6,5,'ZURICH','742958-2016','2013-10-01','2014-09-30','2014-05',5,'REGULAR'),(613,'I4080800072-208','JURISDICCIÃ³N','ZACUALTIPÃ¡N','NISSAN','PICK-UP',2005,'HMX7269',307667,'3N6DD13S55K006768','KA24-243097A',4,6,'ZURICH','742958-225','2013-10-01','2014-09-30','2014-05',5,'REGULAR'),(649,'I4080800072-183','JURISDICCIÃ³N','ZACUALTIPÃ¡N','NISSAN','PICK-UP',2007,'HNB9836',335856,'3N6DD13S27K012501','KA24324481A',4,6,'ZURICH','679014-13','2012-10-01','2013-10-01','2014-07',4,'REGULAR'),(650,'I4080800072-184','ZACUALTIPÃN','ZACUALTIPÃ¡N','NISSAN','PICK-UP',2007,'HH46587',108155,'3N6DD13S27K012353','KA24324346A',4,6,'ZURICH','679014-14','2012-10-01','2013-10-01','2014-02',5,'REGULAR'),(654,'I4080800072-188','JURISDICCIÃ³N','ZACUALTIPÃ¡N','NISSAN','PICK-UP',2007,'HH46597',185029,'3N6DD13S87K012325','KA24324331A',4,6,'ZURICH','721199505-16','2013-01-01','2013-09-30','2014-02',4,'REGULAR'),(670,'I4080800072-204','JURISDICCIÃ³N','ZACUALTIPÃ¡N','CHEVROLET','PICK-UP',2007,'HH46561',198775,'3GCEC14V27G225471','HECHO EN MEX.',8,4,'ZURICH','742958-244','2013-10-01','2014-09-30','2014-04',7,'REGULAR'),(742,'I4080800028-23','ZACUALTIPÃN','ZACUALTIPÃN','DODGE','PICK-UP',2009,'787',0,'3D3KS28T89G513476','HECHO EN MEX',8,4,'ABA/SEGUROS','M034000005-13','2014-01-14','2014-03-14','2014-02',5,'REGULAR');
/*!40000 ALTER TABLE `unidad_de_transporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(3) NOT NULL AUTO_INCREMENT COMMENT 'identificador de usuarios',
  `nombre_usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre de ususarios',
  `contrasenia_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'contraseña para ingresar',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `nombre_usuario` (`nombre_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla para los usuarios que pueden ingresar al sistema';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'ADMINISTRADOR','55');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vales`
--

DROP TABLE IF EXISTS `vales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vales` (
  `No_vale` int(5) NOT NULL COMMENT 'Campo que almacena el valor Ãºnico de cada vale para identificarlo.',
  `Dia_f_v` int(2) NOT NULL COMMENT 'Guarda el dÃ­a en que se realizo el vale.',
  `Mes_f_v` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda el mes en que se realizo el vale con letras.',
  `Anio_f_v` int(4) NOT NULL COMMENT 'Almacena el aÃ±o de realizaciÃ³n del vale.',
  `No_eco_U_T` int(5) NOT NULL COMMENT 'Guarda el identificador del vehÃ­culo para el que se realizo el vale depende de la tabla Unidad_de_transporte.',
  `K_inicial` int(10) NOT NULL COMMENT 'Almacena el kilometraje inicial del vehÃ­culo al momento de la realizaciÃ³n del vale.',
  `K_final` int(10) NOT NULL COMMENT 'Almacena el kilometraje que tendrÃ¡ el vehÃ­culo despuÃ©s del viaje Calculado con el K_inicial mas el Recorrido_aprox.',
  `Recorrido_aprox` double(5,2) NOT NULL COMMENT 'Guarda el recorrido aproximado que realizara el vehÃ­culo segÃºn el Destino asignado.',
  `No_oficio_comision` int(5) NOT NULL COMMENT 'Guarda el nÃºmero de oficio de comisiÃ³n del vale.',
  `C_C_Monto` double(10,2) NOT NULL COMMENT 'Almacena la cantidad de dinero por la que se realizo el vale.',
  `C_C_Litros_aprox` double(10,2) NOT NULL COMMENT 'Guarda la cantidad de litros de gasolina aproximados segÃºn el monto asignado y el precio actual de la gasolina.',
  `Precio_gasolina` double(10,2) NOT NULL COMMENT 'Guarda el precio del litro de gasolina al momento de la realizaciÃ³n del vale.',
  `Consumo_p_litro` double(10,2) NOT NULL COMMENT 'Guarda el monto en pesos consumido por litro de gasolina Precio del litro.',
  `Rendimiento_p_litro` int(5) NOT NULL COMMENT 'Guarda el rendimiento que tiene el vehÃ­culo usado por cada litro de gasolina KM/LT.',
  `D_de` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el lugar de salida del vehÃ­culo a usar.',
  `D_a` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el lugar destino del vehÃ­culo.',
  `Conductor` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda el nombre del conductor que va a usar el vehÃ­culo.',
  PRIMARY KEY (`No_vale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='En la tabla Vales se guardan los datos de cada vale otorgado al personal.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vales`
--

LOCK TABLES `vales` WRITE;
/*!40000 ALTER TABLE `vales` DISABLE KEYS */;
INSERT INTO `vales` VALUES (448,30,'JUNIO',2014,613,307620,307667,46.99,1286,100.00,7.83,12.77,12.77,6,'ZACUALTIPAN HGO.','MOLANGO','DR. B. GERARDO VIVANCO CORTEZ');
/*!40000 ALTER TABLE `vales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vales_anterior`
--

DROP TABLE IF EXISTS `vales_anterior`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vales_anterior` (
  `No_vale` int(5) NOT NULL COMMENT 'Campo que almacena el valor Ãºnico de cada vale para identificarlo.',
  `Dia_f_v` int(2) NOT NULL COMMENT 'Guarda el dÃ­a en que se realizo el vale.',
  `Mes_f_v` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda el mes en que se realizo el vale con letras.',
  `Anio_f_v` int(4) NOT NULL COMMENT 'Almacena el aÃ±o de realizaciÃ³n del vale.',
  `No_eco_U_T` int(5) NOT NULL COMMENT 'Guarda el identificador del vehÃ­culo para el que se realizo el vale depende de la tabla Unidad_de_transporte.',
  `K_inicial` int(10) NOT NULL COMMENT 'Almacena el kilometraje inicial del vehÃ­culo al momento de la realizaciÃ³n del vale.',
  `K_final` int(10) NOT NULL COMMENT 'Almacena el kilometraje que tendrÃ¡ el vehÃ­culo despuÃ©s del viaje Calculado con el K_inicial mas el Recorrido_aprox.',
  `Recorrido_aprox` double(5,2) NOT NULL COMMENT 'Guarda el recorrido aproximado que realizara el vehÃ­culo segÃºn el Destino asignado.',
  `No_oficio_comision` int(5) NOT NULL COMMENT 'Guarda el nÃºmero de oficio de comisiÃ³n del vale.',
  `C_C_Monto` double(10,2) NOT NULL COMMENT 'Almacena la cantidad de dinero por la que se realizo el vale.',
  `C_C_Litros_aprox` double(10,2) NOT NULL COMMENT 'Guarda la cantidad de litros de gasolina aproximados segÃºn el monto asignado y el precio actual de la gasolina.',
  `Precio_gasolina` double(10,2) NOT NULL COMMENT 'Guarda el precio del litro de gasolina al momento de la realizaciÃ³n del vale.',
  `Consumo_p_litro` double(10,2) NOT NULL COMMENT 'Guarda el monto en pesos consumido por litro de gasolina Precio del litro.',
  `Rendimiento_p_litro` int(5) NOT NULL COMMENT 'Guarda el rendimiento que tiene el vehÃ­culo usado por cada litro de gasolina KM/LT.',
  `D_de` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el lugar de salida del vehÃ­culo a usar.',
  `D_a` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Almacena el lugar destino del vehÃ­culo.',
  `Conductor` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Guarda el nombre del conductor que va a usar el vehÃ­culo.',
  PRIMARY KEY (`No_vale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='En la tabla Vales se guardan los datos de cada vale otorgado al personal.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vales_anterior`
--

LOCK TABLES `vales_anterior` WRITE;
/*!40000 ALTER TABLE `vales_anterior` DISABLE KEYS */;
/*!40000 ALTER TABLE `vales_anterior` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-12  9:30:53
