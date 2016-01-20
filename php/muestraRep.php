<?php
include_once("Maneja_con.php");
$noecogr=$_POST["noecogr"];
$mes_fv=$_POST["mes_fv"];
$anio_fv=$_POST["anio_fv"];
$html="";

$conect=new ManejaCon;
	if ($conect->conectar()==true) {/*si se realiza la conexion*/

	$querycr="SELECT * FROM vales WHERE No_eco_U_T=$noecogr AND Mes_f_v='$mes_fv' AND Anio_f_v=$anio_fv order by No_vale";

$respuesta=new stdClass();/*para guardar la respuesta con json se declara la variable*/

	$resultcr=@mysql_query($querycr);
if (!$resultcr) {/*si esta vacio retorna false*/
	$respuesta->informe="NO Existen Registros con los Datos Proporcionados";
	$respuesta->si_no=0;
}else{/*si no retorna el resultado de la consulta*/
$respuesta->informe="Ok";

	$html=$html.'Porfavor Llene los datos Necesarios para Generar e Imprimir la Bitácora:<br><br>
	<div class="clearfix"></div>
	<label for="factura_rep" class="leftfloat" id="label_facturarep" >FACTURA:</label>
              <input form="bitacora_vehiculo" type="text" name="factura_rep" id="factura_rep" class="leftfloat" required>
               <div class="clearfix"></div><br>
	<table border=".5" bordercolor="white" cellpadding="1" id="tabrep"> <tr bgcolor="#CCCCCC">
			<td width="5%" rowspan="2">No. de Vale</td>
			<td width="9%" rowspan="2">Dia</td>
            <td width="12%" colspan="2">Kilometraje</td>
			

			<td width="6%" rowspan="2">Recorrido</td>
			<td width="5%" rowspan="2">Oficio de Comisión</td>
			<td width="6%" rowspan="2">Importe</td>
			<td width="6%" rowspan="2">Litros</td>
			<td width="6%" rowspan="2">Consumo x Litro</td>
			<td width="6%" rowspan="2">Rendimiento x Litro</td>
			<td width="26%" colspan="2">Destino</td>
			
			<td width="13%" rowspan="2">Nombre del Conductor</td>
			</tr>
			<tr bgcolor="#CCCCCC">
			<td >K Inicial</td>
			<td >K Final</td>
			<td >De</td>
			<td >A</td>
			</tr>';
			$sumaRecorrido=0;
			$sumaImporte=0;
			$sumaLitros=0;
while($row=mysql_fetch_array($resultcr)){				
				$html = $html.'<td>';
				$html = $html. $row["No_vale"];
				$html = $html.'</td><td>';
				$html = $html. $row["Dia_f_v"]." ".$row["Mes_f_v"]." ".$row["Anio_f_v"];
				$html = $html.'</td><td>';
				$html = $html. $row["K_inicial"];
				$html = $html.'</td><td>';
				$html = $html. $row["K_final"];
				$html = $html.'</td><td>';
				$html = $html. $row["Recorrido_aprox"];
				$html = $html.'</td><td>';
				$html = $html. $row["No_oficio_comision"];
				$html = $html.'</td><td>';
				$html = $html.'$ '. $row["C_C_Monto"];
				$html = $html.'</td><td>';
				$html = $html. $row["C_C_Litros_aprox"];
				$html = $html.'</td><td>';
				$html = $html. '$ '.$row["Consumo_p_litro"];
				$html = $html.'</td><td>';
				$html = $html. $row["Rendimiento_p_litro"];
				$html = $html.'</td><td>';
				$html = $html. $row["D_de"];
				$html = $html.'</td><td>';
				$html = $html. $row["D_a"];
				$html = $html.'</td><td>';
				$html = $html. $row["Conductor"];
				$html = $html.'</td></tr>';		
				
				$sumaRecorrido=$sumaRecorrido+($row["Recorrido_aprox"]);
				$sumaImporte=$sumaImporte+($row["C_C_Monto"]);
				$sumaLitros=$sumaLitros+($row["C_C_Litros_aprox"]);
			}
						$html=$html.'<tr><td colspan="13"></td></tr>
						<tr>
			<td width="5%"></td>
			<td width="9%" bgcolor="#CCCCCC">TOTALES:</td>
            <td width="6%"></td>
			<td width="6%"></td>
			

			<td width="6%" bgcolor="#CCCCCC" id="sumaRecorrido">'.$sumaRecorrido.'</td>
			<td width="5%" ></td>
			<td width="6%" bgcolor="#CCCCCC">$ <div id="sumaImporte">'.$sumaImporte.'</div></td>
			<td width="6%" bgcolor="#CCCCCC" id="sumaLitros">'.$sumaLitros.'</td>
			<td width="6%" ></td>
			<td width="6%" ></td>
			<td width="13%"></td>
			<td width="13%"></td>

			<td width="13%" rowspan="2"></td></tr>';
			$html=$html.'</table></div><br><br><br>';	
			$html=$html.'<table >
			<tr>
			<td width="13%" >OBSERVACIONES:</td>
			<td width="85%"><input form="bitacora_vehiculo" name="obs_bitac" type="text" id="obs"></td>
			</tr>
			</table>';
			$html=$html.'<br><br><br><table align="center" width="100%">
			<tr>
			<td>ELABORÓ:</td>
			<td>Vo. Bo.:</td>
			<td>AUTORIZÓ:</td>
			</tr>
			
			<tr width="100%%">
			<td width="33.3%"><input form="bitacora_vehiculo" name="elaboro_bitac" type="text" id="elaboro_bitac" class="sff" value="ING. JUAN PEDRO ZERON ARTEAGA"></td>
			<td width="33.3%"><input form="bitacora_vehiculo" name="vobo_bitac" type="text" id="vobo_bitac" class="sff" value="L.C. LEOCADIA HERNANDEZ HDEZ"></td>
			<td width="33.3%"><input form="bitacora_vehiculo" name="autorizo_bitac" type="text" id="autorizo_bitac" class="sff" value="DR. B. GERARDO VIVANCO CORTEZ"></td>
			</tr>
			</table>
			<div class="clearfix"></div>
              <div id="opciones_consultar">

             <span id="gr" class="boton_consultar"><a href="javascript:generarRep();" class="enlace_consultar">Generar Bitácora</a></span>
         </div>
         <div class="clearfix"></div>';			

$respuesta->mostrarrep=$html;
$respuesta->si_no=1;
}
 }

$rejson = json_encode($respuesta);/*se convierte a json*/
echo $rejson;
?>