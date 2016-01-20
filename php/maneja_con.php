<?php 
include_once("config.php");
class ManejaCon{
  var $conect;
     function ManejaCon(){
	 }
	 
	 function conectar() {
	     if(!($conect=@mysql_connect('localhost','root','')))
		 {
		     echo"Error al conectar a la base de datos";	
			 exit();
	      }
		  if (!@mysql_select_db('control_de_vales',$conect)) {
		   echo "error al seleccionar la base de datos";  
		   exit();
		  }
	       $this->conect=$conect;
		   return true;	
	 }
}
?>
