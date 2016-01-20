<?php
include_once("Maneja_con.php");
require_once('../tcpdf/config/lang/eng.php');
	require_once('../tcpdf/tcpdf.php');

$elaborocut=$_POST["elaborocut"];


function generarPDF($elaborocut){
	$conect=new ManejaCon;
	if ($conect->conectar()==true) {/*si se realiza la conexion*/
		$html="";
	$querycr="SELECT * FROM unidad_de_transporte order by No_eco";
$i=0;

	$resultcr=@mysql_query($querycr);
if (!$resultcr) {/*si esta vacio retorna false*/
	return "NO EXISTEN UNIDADES DE TRANSPORTE";
}else{/*si no retorna el resultado de la consulta*/
/*$conect1=new ManejaCon;
	if ($conect1->conectar()==true) {/*si se realiza la conexion

	$querycrv="SELECT * FROM unidad_de_transporte WHERE No_eco=$noecogr";
	$resultcrv=@mysql_query($querycrv);
 }

$rowv=mysql_fetch_array($resultcrv);*/

	$html=$html.'<style>
	#enccut{
font-size: 50px; 
}	</style>
	<div align="center" ><div id="enccut">
	<table>
	<tr>
	<td width="17%" align="center"><br><br><img src="../img/logoss.png"></td>
	<td width="17%" align="center"><br><br><img src="../img/hidalgo.png"></td>
	<td width="32%">
	<strong>SERVICIOS DE SALUD DE HIDALGO</strong><br>
			DIRECCION ADMINISTRATIVA<br>
			SUBDIRECCION DE INFRAESTRUCTURA<br>
			JURISDICCION SANITARIA NO. 17 ZACUALTIPAN, HGO.<br>
			DEPARTAMENTO DE CONSERVACION Y MANTENIMIENTO<br>
			<h3>CATALOGO DE UNIDADES DE TRANSPORTE '.date("Y").'</h3> <br>
			</td>
			<td width="17%" align="right"><br><br><img src="../img/escudo.png"></td>
			<td width="17%"></td>
			</tr>
			</table></div>
			<table border=".5" bordercolor="white" cellpadding="1" >
			<tr bgcolor="#CCCCCC">
			<td width="2.5%" rowspan="2">No. Eco.</td>
			<td width="7%" rowspan="2">No. Inv.</td>
            <td width="8%" rowspan="2">Localidad</td>
			<td width="8%" rowspan="2">Municipio</td>
			<td width="6%" rowspan="2">Marca</td>
			<td width="5%" rowspan="2">Tipo</td>
			<td width="3.5%" rowspan="2">Modelo</td>
			<td width="5%" rowspan="2">Placas</td>
			<td width="10%" rowspan="2">No. de Identificacion Vehicular</td>
			<td width="7%" rowspan="2">No. Motor</td>
			<td width="2%" rowspan="2">No. Cil.</td>
			<td width="23.5%" colspan="4">Seguro Vehicular</td>
			<td width="5%" rowspan="2">Verif.</td>
			<td width="2.5%" rowspan="2">Tipo de Serv.</td>
			<td width="5%" rowspan="2">Estado Fisico</td>
			</tr>
			<tr bgcolor="#CCCCCC">
			<td >Aseg.</td>
			<td >Poliza</td>
			<td >Exped.</td>
			<td >Vigen.</td>
			</tr>';

			while($row=mysql_fetch_array($resultcr)){		
				$html = $html.'<tr><td>';
				$html = $html. $row["No_eco"];
				$html = $html.'</td><td>';
				$html = $html. $row["No_inventario"];
				$html = $html.'</td><td>';
				$html = $html. $row["Localidad"];
				$html = $html.'</td><td>';
				$html = $html. $row["Municipio"];
				$html = $html.'</td><td>';
				$html = $html. $row["Marca"];
				$html = $html.'</td><td>';
				$html = $html. $row["Tipo"];
				$html = $html.'</td><td>';
				$html = $html. $row["Modelo"];
				$html = $html.'</td><td>';
				$html = $html. $row["Placas"];
				$html = $html.'</td><td>';
				/*$html = $html. $row["Kilometraje"];
				$html = $html.'</td><td>';*/
				$html = $html. $row["No_identificacion_vehicular"];
				$html = $html.'</td><td>';
				$html = $html. $row["No_motor"];
				$html = $html.'</td><td>';
				$html = $html. $row["No_cilintros"];
				$html = $html.'</td><td>';
				/*$html = $html. $row["Rendimiento_p_litro"];
                $html = $html.'</td><td>';*/
				$html = $html. $row["Aseguradora"];
				$html = $html.'</td><td>';
				$html = $html. $row["Poliza"];
				$html = $html.'</td><td>';
				$html = $html. $row["Exped"];
				$html = $html.'</td><td>';
				$html = $html. $row["Vigencia"];
				$html = $html.'</td><td>';
				$html = $html. $row["Verificacion"];
				$html = $html.'</td><td>';
				$html = $html. $row["Numero_tipo_de_servicio"];
				$html = $html.'</td><td>';
				$html = $html. $row["Estado_fisico"];
				$html = $html.'</td></tr>';		

			}
						
			$html=$html.'</table></div><br><br>';	
			$html=$html.'<table>
			<tr>
			<td align="right">ESTADO FISICO:  </td>
			<td align="left" width="20%"> Nuevo</td>
			<td align="right" width="9%">TIPO DE SERVICIO:  </td>
			<td align="left" width="31%"> 01 = Ambulancia</td>
			<td width="20%"></td>
			</tr>
			<tr>
			<td></td>
			<td align="left"> Reparable</td>
			<td></td>
			<td> 02 = Vehiculo de Abasto de Almacén y Material De Consumo</td>
			<td></td>
			</tr>
			<tr>
			<td></td>
			<td align="left"> Desechable (Para dar de Baja)</td>
			<td></td>
			<td> 03 = Vehiculo de Abasto de Material de Obras Conservación y Mantenimiento</td>
			<td></td>
			</tr>
			<tr>
			<td></td>
			<td align="left"> Sustituible</td>
			<td></td>
			<td> 04 = Vehiculo de Transporte de Personal Médico y Paramédico</td>
			<td></td>
			</tr>
			<tr>
			<td></td>
			<td align="left"> Baja</td>
			<td></td>
			<td> 05 = Vehiculos de Supervisión de Programas de Salud</td>
			<td></td>
			</tr>
			<tr>
			<td></td>
			<td></td>
			<td></td>
			<td> 06 = Vehiculo de Supervisión de Obras de Conservación y Mantenimiento</td>
			<td></td>
			</tr>
			<tr>
			<td></td>
			<td></td>
			<td></td>
			<td> 07 = Vehiculo de Personal Directivo</td>
			<td></td>
			</tr>
			<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
			</table><br> <br>
			ELABORO: '.$elaborocut.'<br>FECHA: '.date("Y-m-d");			
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
$pdf->SetTitle('Catalogo de Unidades de Transporte');
$pdf->SetSubject('Sistema Desarrollado por Carlos Montiel');
$pdf->SetKeywords('Catalogo, Gasolina, Unidades de Transporte');
$pdf->SetHeaderData('logo_bnco.png', '4%','CAT_U_T_'.date("Y-m-d"), 'Sistema de Control para Vales de Gasolina V-1.2');
$pdf->setHeaderFont(Array('courier', '', 3));

/*$arial = $pdf->addTTFfont('../font/arial.ttf', 'TrueTypeUnicode', '', 32);*/
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(4, PDF_MARGIN_TOP, 4);
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

$pdf->SetFont('arial', '', 7, '', true);

// Add a page 
// This method has several options, check the source code documentation for more information.
$pdf->setPrintHeader(true); //no imprime la cabecera ni la linea 
$pdf->setPrintFooter(true); // imprime el pie ni la linea 
$pdf->AddPage();

//*************
  ob_end_clean();//rompimiento de pagina
//************* 

$html = generarPDF($elaborocut);
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
$nombre='CatalogoUT-'.date("Y-m-d").'.pdf';
$pdf->Output($nombre, 'I');

return $pdf;
?>