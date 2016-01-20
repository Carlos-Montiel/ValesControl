<?php
 
session_start();
include ('config.php');

if ( !isset($_SESSION['username']) && !isset($_SESSION['userid']) ){
	
		if ( @$idcnx = @mysql_connect($host,$user,$password) ){
			if ( @mysql_select_db($database,$idcnx) ){
				$sql = 'SELECT * FROM usuarios WHERE nombre_usuario="' . $_POST['name_user']. '" && contrasenia_usuario="' . $_POST['password_user'] . '" LIMIT 1';
				if ( @$res = @mysql_query($sql) ){
					if ( @mysql_num_rows($res) == 1 ){
						
						$usuario = @mysql_fetch_array($res);
						
						$_SESSION['username']	= $usuario['nombre_usuario'];
						$_SESSION['userid']	= $usuario['id_usuario'];
						echo 1;
						
					}
					else
						echo 0;
				}
				else
					echo 0;
				
				
			}
			
			mysql_close($idcnx);
		}
		else
			echo 0;
	}
	else{
		echo 0;
	}
?>