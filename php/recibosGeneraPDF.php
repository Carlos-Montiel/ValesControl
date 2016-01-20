<?php
include_once("Maneja_con.php");
require_once('../tcpdf/config/lang/eng.php');
  require_once('../tcpdf/tcpdf.php');


set_time_limit(200);


$mes_ir=$_POST["mes_mr"];
$anio_ir=$_POST["anio_mr"];

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sistema de Control de Vales Para Gasolina');
$pdf->SetTitle('Recibos de Vales de Gasolina'.$mes_ir.'-'.$anio_ir);
$pdf->SetSubject('Sistema Desarrollado por Carlos Montiel');
$pdf->SetKeywords('Vales, Gasolina, Recibos');

$pdf->SetHeaderData('logo_bnco.png', '4%','RECIBOS'.date("Y-m-d"), 'Sistema de Control para Vales de Gasolina V-1.2');
$pdf->setHeaderFont(Array('courier', '', 3));
/*$arial = $pdf->addTTFfont('../font/arial.ttf', 'TrueTypeUnicode', '', 32);*/

// set header and footer fonts

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 15, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('arial', '', 8, '', true);

// add a page
$pdf->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */
$conect=new ManejaCon;
  if ($conect->conectar()==true) {/*si se realiza la conexion*/
    $html="";
  $querycr="SELECT * FROM recibo WHERE F_mes='$mes_ir' AND F_anio=$anio_ir order by Folio_recibo";
$i=0;
  $ch=0;
$c3v=3;
  $resultcr=@mysql_query($querycr);
if (!$resultcr) {/*si esta vacio retorna false*/
  $html ="NO EXISTEN RECIBOS";
}else{/*si no retorna el resultado de la consulta*/

      while($row=mysql_fetch_array($resultcr)){
      $ch=$ch+1; 
      $no_ecoc= $row['No_eco_U_T']; 
      $querynoeco="SELECT * FROM unidad_de_transporte WHERE No_eco=$no_ecoc";
      $resultnoeco=@mysql_query($querynoeco);
      $rowneco=mysql_fetch_array($resultnoeco);
// define some HTML content with style
$html = $html.<<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
.capa_rec{
float: left;
margin: 1% 5%;
border: 1px solid #999;
width: 90%;
background: white;
position: relative;
}
.imglogo{
width:1500%;
}
.textenc{

}
</style>
        <div class="capa_rec">
            <table  width="98%" cellspacing="2" valign="baseline">
            <tr>
<td colspan="7">

</td>

</tr>
       <tr>
<td>
<img class="imglogo" src="../img/ssh_logo.png">
</td>
<td align="center" class="textenc" colspan="5">
<strong>SERVICIOS DE SALUD DE HIDALGO</strong><br>
                Jurisdicción Sanitaria No. 17 Zacualtipán, Hgo.<br>
                Solicitud de de Suministro de Combustible<br>
                Dirección Administrativa<br>
</td>
<td >

</td>
</tr>

    <tr>
<td>
FECHA:
</td>
<td align="center" colspan="2" border="1">
EOF
.$row['F_dia'].' de '.$row['F_mes'].' del '.$row['F_anio'].<<<EOF
</td>
<td colspan="2">

</td>
<td >
FOLIO:
</td>
<td align="center" border="1">
EOF
.$row['Folio_recibo'].<<<EOF
</td>
</tr>

     <tr>
<td colspan="2">
AREA SOLICITANTE:
</td>
<td align="center" colspan="3" border="1">
EOF
.$row['Area_solicitante'].<<<EOF
</td>
<td colspan="2">

</td>

</tr>

   <tr>
<td colspan="2">
VEHICULO:
</td>
<td align="center" border="1">
EOF
.$rowneco['Marca'].<<<EOF
</td>
<td align="center">
NO. ECO.:
</td>

<td align="center" border="1">
EOF
.$row['No_eco_U_T'].<<<EOF
</td>
<td>
CILINDRAJE:
</td>
<td align="center" border="1">
EOF
.$rowneco['No_cilintros'].<<<EOF
</td>
</tr>

  <tr>
<td colspan="2">
OF. DE COMISION NO.:
</td>
<td align="center" border="1">
EOF
.$row['No_oficio_comision'].<<<EOF
</td>
<td>

</td>


<td>
COMISIONADO A:
</td>
<td align="center" colspan="2" border="1">
EOF
.$row['Destino'].<<<EOF
</td>
</tr>

  <tr>
<td colspan="2">
RECORRIDO APROXIMADO:
</td>
<td align="center" border="1">
EOF
.$row['Recorrido_aprox'].<<<EOF
</td>
<td>
KM.
</td>

<td colspan="3">

</td>
</tr>

  <tr>
<td align="center" border="1">
$ 
EOF
.$row['Monto_numero'].<<<EOF
</td>
<td>

</td>
<td colspan="3" align="center" border="1">
EOF
.$row['Monto_letra'].<<<EOF
</td>

<td>
LITROS:
</td>

<td align="center" border="1">
EOF
.$row['Litros'].<<<EOF
</td>
</tr>

  <tr>
<td align="center" colspan="2">

</td>
<td align="center" colspan="3">

</td>
<td align="center" colspan="2">

</td>

</tr>

  <tr>
<td align="center" colspan="2">
AUTORIZO
</td>
<td align="center" colspan="3">
Vo. Bo.
</td>
<td align="center" colspan="2">
RECIBI
</td>

</tr>

   <tr>
<td>

</td>
<td>

</td>
<td>

</td>
<td>

</td>
<td>

</td>
<td>

</td>
<td>

</td>
</tr>

  <tr>
<td align="center" colspan="2">
_________________________
</td>
<td align="center" colspan="3">
_________________________
</td>
<td align="center" colspan="2">
_________________________
</td>

</tr>

  <tr>
<td align="center" colspan="2">
EOF
.$row['Nombre_recibi'].<<<EOF
</td>
<td align="center" colspan="3">
EOF
.$row['Nombre_vo.bo'].<<<EOF
</td>
<td align="center" colspan="2">
EOF
.$row['Nombre_autorizo'].<<<EOF
</td>

</tr>

  
            </table>


         </div><!--termina capa recibo-->

EOF;

if ($ch==$c3v) {
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
$c3v=$c3v+3;
// reset pointer to the last page
$pdf->lastPage();
$pdf->addPage();
// ---------------------------------------------------------

$html="";
//============================================================+
// END OF FILE
//============================================================+
}
    }
            
      
         
}

}/*termina if($conect->conectar()==true)*/
$html=$html.'<center><br>No. de Recibos Encontrados '.$mes_ir.' - '.$anio_ir.' = <strong>'.$ch.'</strong></center>';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Recibos_'.$mes_ir.'-'.$anio_ir, 'I');
//============================================================+
// END OF FILE
//============================================================+