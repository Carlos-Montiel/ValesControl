<?php
include_once("Maneja_con.php");
require_once('../tcpdf/config/lang/eng.php');
	require_once('../tcpdf/tcpdf.php');

$noecogr=$_POST["noecogr"];
$mes_fv=$_POST["mes_fv"];
$anio_fv=$_POST["anio_fv"];
$factura_rep=strtoupper($_POST["factura_rep"]);
$elaboro_bitac=strtoupper($_POST["elaboro_bitac"]);
$vobo_bitac=strtoupper($_POST["vobo_bitac"]);
$autorizo_bitac=strtoupper($_POST["autorizo_bitac"]);
$obs_bitac=strtoupper($_POST["obs_bitac"]);

function generarPDF($noecogr, $mes_fv, $anio_fv, $factura_rep, $elaboro_bitac, $vobo_bitac, $autorizo_bitac, $obs_bitac){
	$conect=new ManejaCon;
	if ($conect->conectar()==true) {/*si se realiza la conexion*/
		$html="";
	$querycr="SELECT * FROM vales WHERE No_eco_U_T=$noecogr AND Mes_f_v='$mes_fv' AND Anio_f_v=$anio_fv order by No_vale";
$i=0;

	$resultcr=@mysql_query($querycr);
if (!$resultcr) {/*si esta vacio retorna false*/
	return "NO EXISTEN REGISTROS CON LOS DATOS PROPORCIONADOS";
}else{/*si no retorna el resultado de la consulta*/
$conect1=new ManejaCon;
	if ($conect1->conectar()==true) {/*si se realiza la conexion*/

	$querycrv="SELECT * FROM unidad_de_transporte WHERE No_eco=$noecogr";
	$resultcrv=@mysql_query($querycrv);
 }
$rowv=mysql_fetch_array($resultcrv);
	$html=$html.'<div align="center" >
	<table >
	<tr>
	<td width="17%" align="center"><img src="../img/logoss.png"></td>
	<td width="17%" align="center"><img src="../img/hidalgo.png"></td>
	<td width="32%" valign="middle"><br><br>SERVICIOS DE SALUD DE HIDALGO<br>
			BITACORA DE VEHICULO.
			<br />
			RECORRIDO Y CONSUMO DE COMBUSTIBLE		<br></td>
			<td width="17%" align="right"><img src="../img/escudo.png"></td>
			<td width="17%"></td>
			</tr>
			</table>
			<div id="datos_rep">
			<table border="0" align="left" >
			<tr>
			<td margin="10%">UNIDAD ADMINISTRATIVA:</td>
			<td >'.$rowv["Municipio"].'</td>
			<td colspan="4"></td>
			</tr>
			<tr>
			<td >ASIGNADO A:</td>
			<td >'.$rowv["Municipio"].'</td>
			<td >TIPO:</td>
			<td >'.$rowv["Tipo"].'</td>
			<td >COSTO P/LT:</td>';
$mes_fvM=strtoupper($mes_fv);
	$querycpg="SELECT * FROM precio_gas WHERE Anio=$anio_fv AND Mes='$mes_fvM'";
	$resultcpg=@mysql_query($querycpg);
 
$rowpg=mysql_fetch_array($resultcpg);
			$html=$html.'<td >$ '.$rowpg["Precio"].'</td>
			</tr>
			<tr>
			<td >MARCA:</td>
			<td >'.$rowv["Marca"].'</td>
			<td >PLACAS:</td>
			<td >'.$rowv["Placas"].'</td>
			<td >MES:</td>
			<td >'.$mes_fv.'</td>
			</tr>
			<tr>
			<td >MODELO:</td>
			<td >'.$rowv["Modelo"].'</td>
			<td >NO. ECO.:</td>
			<td >'.$rowv["No_eco"].'</td>
			<td >AÑO:</td>
			<td >'.$anio_fv.'</td>
			</tr>
			<tr>
			<td >NO. INV.:</td>
			<td >'.$rowv["No_inventario"].'</td>
			<td >NO. SERIE:</td>
			<td >'.$rowv["No_identificacion_vehicular"].'</td>
			<td >FACTURA:</td>
			<td >'.$factura_rep.'</td>
			</tr>
			<tr>
			<td >NO. MOTOR:</td>
			<td >'.$rowv["No_motor"].'</td>
			<td colspan="4"></td>
			</tr>
			</table>
			</div>

			<table border=".5" bordercolor="white" cellpadding="1">';	
			$html=$html.'<tr bgcolor="#CCCCCC">
			<td width="4%" rowspan="2">No. de Vale</td>
			<td width="9%" rowspan="2">Dia</td>
            <td width="12%" colspan="2">Kilometraje</td>
			

			<td width="6%" rowspan="2">Recorrido</td>
			<td width="6%" rowspan="2">Oficio de Comisión</td>
			<td width="6%" rowspan="2">Importe</td>
			<td width="6%" rowspan="2">Litros</td>
			<td width="6%" rowspan="2">Consumo x Litro</td>
			<td width="6%" rowspan="2">Rendimiento x Litro</td>
			<td width="26%" colspan="2">Destino</td>
			
			<td width="13%" rowspan="2">Nombre del Conductor</td>
			</tr>
			<tr bgcolor="#CCCCCC">
			<td >Inicial</td>
			<td >Final</td>
			<td >De</td>
			<td >A</td>
			</tr>';
			$sumaRecorrido=0;
			$sumaImporte=0;
			$sumaLitros=0;
			while($row=mysql_fetch_array($resultcr)){
				if($i%2==0){
					$html=  $html.'<tr>';
				}else{
					$html=$html.'<tr>';
				}
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
				$i++;
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
			

			<td width="6%" bgcolor="#CCCCCC">'.$sumaRecorrido.'</td>
			<td width="5%" ></td>
			<td width="6%" bgcolor="#CCCCCC">$ '.$sumaImporte.'</td>
			<td width="6%" bgcolor="#CCCCCC">'.$sumaLitros.'</td>
			<td width="6%" ></td>
			<td width="6%" ></td>
			<td width="13%"></td>
			<td width="13%"></td>

			<td width="13%" rowspan="2"></td></tr>';
			$html=$html.'</table></div><br><br><br>';	
			$html=$html.'<table >
			<tr>
			<td width="13%" >OBSERVACIONES:</td>
			<td width="85%">___'.$obs_bitac.'_______________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________.</td>
			</tr>
			</table>';
			$html=$html.'<br><br><br><table align="center">
			<tr>
			<td height="40px">ELABORÓ</td>
			<td>Vo. Bo.</td>
			<td>AUTORIZÓ</td>
			</tr>
			<tr>
			<td >______________________________</td>
			<td>______________________________</td>
			<td>______________________________</td>
			</tr>
			<tr>
			<td>'.$elaboro_bitac.'</td>
			<td>'.$vobo_bitac.'</td>
			<td>'.$autorizo_bitac.'</td>
			</tr>
			</table>';			
     		 return ($html);
}

}/*termina if($conect->conectar()==true)*/
	
 }/*temina funcion*/

/*hacer primero*/


	$perfil="";
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sistema de Control de Vales Para Gasolina');
$pdf->SetTitle('Bitacora de Vehiculo');
$pdf->SetSubject('Sistema Desarrollado por Carlos Montiel');
$pdf->SetKeywords('Bitacora, Gasolina, Vehiculo, Vales');
$pdf->SetHeaderData('logo_bnco.png', '4%','BITA_VEHI_'.$noecogr.'_'.date("Y-m-d"), 'Sistema de Control para Vales de Gasolina V-1.2');
$pdf->setHeaderFont(Array('courier', '', 3));
/*$arial = $pdf->addTTFfont('../font/arial.ttf', 'TrueTypeUnicode', '', 32);*/

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 25, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

$pdf->SetFont('arial', '', 8, '', true);

// Add a page 
// This method has several options, check the source code documentation for more information.
$pdf->setPrintHeader(true); //no imprime la cabecera ni la linea 
$pdf->setPrintFooter(true); // imprime el pie ni la linea 
$pdf->AddPage();

//*************
  ob_end_clean();//rompimiento de pagina
//************* 

$html = generarPDF($noecogr, $mes_fv, $anio_fv, $factura_rep, $elaboro_bitac, $vobo_bitac, $autorizo_bitac, $obs_bitac);
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
$nombre='Bitacora_De_Vehiculo_NoEco-'.$noecogr.'_'.$mes_fv.'_'.date("Y-m-d").'.pdf';
$pdf->Output($nombre, 'I');

return $pdf;
?>