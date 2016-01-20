<?php
// Nombre del archivo de con el cual queremos que se guarde la base de datos
$datosRespaldo = $_POST["datosRespaldo"]; 
$filename = "fichero.sql";  
// Cabeceras para forzar al navegador a guardar el archivo 
header("Pragma: no-cache"); 
header("Expires: 0"); 
header("Content-Transfer-Encoding: binary"); 
header("Content-type: application/force-download"); 
header("Content-Disposition: attachment; filename=$filename"); 
 
$usuario="root";  // Usuario de la base de datos, un ejemplo podria ser 'root' 
$passwd="";  // Contraseña asignada al usuario 
$bd="control_de_vales";  // Nombre de la Base de Datos a exportar 
 
// Funciones para exportar la base de datos 
$executa = "c:\\xampp\\mysql\\bin\\mysqldump.exe -u $usuario --password=$passwd --opt $bd > ../sql/$datosRespaldo.sql"; 
system($executa, $resultado); 
 
// Comprobar si se ha realizado bien, si no es así, mostrará un mensaje de error 
if ($resultado) { echo "<H1>Error Ejecutando el Respaldo Mensual"; }else{echo "<H1>Se Creó el Respaldo Mensual de la BD</H1>\n"; }
 
?>