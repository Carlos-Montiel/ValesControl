<?php
	/**
	*@package
	*@author Carlos Montiel <center_xcm@hotmail.com>
	*@var $host almacena la dirección IP del servidor
	*@var $user almacena el usuario
	*@var $password almacena la contraseña del servidor
	*@var $database almacena la base de datos con la que se trabaja
	**/ 
$host="localhost";
$user="root";
$password="";
$database="control_de_vales";
$link=mysql_connect($host, $user, $password);

mysql_select_db($database,$link) OR DIE ("Error: No es posible establecer la conexión");
?>
