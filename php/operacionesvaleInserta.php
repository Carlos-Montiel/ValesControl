<?php
include_once("Maneja_con.php");

$noeco_vale=$_POST["noeco_vale"];
$recorridoaprox_vale=$_POST["recorridoaprox_vale"];

$obj_conect=new ManejaCon;
if ($obj_conect->conectar()==true) {
	$consdv="SELECT * FROM unidad_de_transporte WHERE No_eco=$noeco_vale";
	$ejeccdv=@mysql_query($consdv);

$resp_dat_v=new stdclass();

if ($row=mysql_fetch_array($ejeccdv)) {
	$resp_dat_v->kinicial_vale=($row['Kilometraje']);
$k_inicial=($row['Kilometraje']);
$k_final=$k_inicial+$recorridoaprox_vale;
	$resp_dat_v->kfinal_vale=$k_final;
	$resp_dat_v->renpl_vale=($row['Rendimiento_p_litro']);

}else{
	echo "Vehiculo no Encontrado";
}


}else{
	echo "Error al conectar a la BD";
}

$resp_dat_vl=json_encode($resp_dat_v);
echo $resp_dat_vl;

?>