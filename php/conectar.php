<?php
	//Crear la funcion para conectar al servidor
	//@return $conexion
	//@autor Carlos Montiel

	function conectar()
	{
		//la palabra reservada "global" es para utilizar las variables de otra clase
		global $host, $user, $password, $database;

		//la variable $conexion hace que se pueda conectar al servido
		$conexion=mysql_connect($host,$user,$password) or die(mysql_error());

		//Se estable la conexion a la base de datos
		mysql_select_db($database,$conexion);

		//se regresa el valor obtenido
		return $conexion;
	}