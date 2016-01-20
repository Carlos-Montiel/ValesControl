<?php
include_once("Maneja_con.php");
require_once('../tcpdf/config/lang/eng.php');
	require_once('../tcpdf/tcpdf.php');

$mes_ir=$_POST["mes_mr"];
$anio_ir=$_POST["anio_mr"];


function generarPDF($mes_ir,$anio_ir){
	$conect=new ManejaCon;
	if ($conect->conectar()==true) {/*si se realiza la conexion*/
		$html="";
	$querycr="SELECT * FROM recibo WHERE F_mes='$mes_ir' AND F_anio=$anio_ir order by Folio_recibo";
$i=0;

	$resultcr=@mysql_query($querycr);
if (!$resultcr) {/*si esta vacio retorna false*/
	return "NO EXISTEN RECIBOS";
}else{/*si no retorna el resultado de la consulta*/
/*$conect1=new ManejaCon;
	if ($conect1->conectar()==true) {/*si se realiza la conexion

	$querycrv="SELECT * FROM unidad_de_transporte WHERE No_eco=$noecogr";
	$resultcrv=@mysql_query($querycrv);
 }

$rowv=mysql_fetch_array($resultcrv);*/

			while($row=mysql_fetch_array($resultcr)){		
				$html = $html.
<style>


/*#capa_recibo{
float: left;
margin: 1% 5%;
border: 1px solid #999;
width: 90%;
background: white;
position: relative;
}

#recibo_dentro{
  margin: 3%;
  width: 94%;
  height: 94%;
}*/

#mesag{
  font-weight: bold;
  font-size: 14px;
}

/*#enc_recibo{
  width: 100%;
  padding-bottom:2%; 
}*/

/*#txt_enc{
float: left;
text-align: center;
margin: auto;
width: 50%;
font: 13px Arial;
margin-left: 15%;
}*/

/*#img_enc{
  float: left;
  width: 73px;
  height: 73px;
}*/

/*#img_enc img{
width: 100%;
height: 100%;
cursor: pointer;
}*/

#capa_form_recibo{
float: left;
width: 100%;
font: 11px Arial;
letter-spacing: 1px;
padding-right: 0;
}

#capa_form_recibo input, .inputs input{
height: 14px;
font: 10px Arial;
margin: 1px 0;
text-transform: uppercase;
}

#capa_firmas_recibo{
float: left;
width: 100%;
text-align: center;
font: 11px Arial;
padding-top:2%;
}

#firma_1{
  float: left;
  margin: 0 2% 0 1%;
  width: 30%;
}

#firma_2{
  float: left;
  margin: 0 2%;
  width: 30%;
}

#firma_3{
  float: left;
  margin: 0 1% 0 2%;
  width: 30%;
}

.leftfloat{
float:left;
margin: -1px;
}             



#label_fecha{
width: 12.5%;
}


#fecha_recibo{
width: 25%;
}

#label_fecha1{
width: 14%;
}

#label_folio{
width: 12.5%;
margin-left: 22%;
}

#folio_recibo{
  width: 12.5%;
}              

#label_area{
width: 30%;
}

#area_recibo{
width: 40%;
}          

#label_vehiculo{
  width: 30%;
}

#vehiculo_recibo{
  width: 12.5%;
}

#label_noeco{
  width: 10%;
  text-align: center;
}

#noeco_recibo{
  width: 12.5%;
}

#label_cilindraje{
  width: 12.5%;
  margin-left: 8%;
}

#cilindraje_recibo{
  width: 12.5%;
}               

#label_ofcom{
width: 30%;
}

#ofcom_recibo{
width: 12.5%;
}

#label_comisionadoa{
width: 15%;
margin-left: 16%;
}

#comisionadoa_recibo{
  width: 25%;
}          

#label_recorrido{
width: 30%;
}

#recorridoaprox_recibo{
width: 12.5%;
}

#label_kmrecorrido{
width: 10%;
text-align: center;
}     

#label_monto{
width: 5%;
text-align: center;
}

#monto_recibo{
width: 12.5%;
}

#label_montoletra{
width: 12%;
text-align: center;
}

#montoletra_recibo{
width: 40%;
}

#label_litros{
width: 12%;
margin-left: 4%;
}

#litros_recibo{
  width: 12.5%;
}               

#rpl_recibo{
height: 14px;
font: 10px Arial;
margin: 1px 0;
text-transform: uppercase;
width: 5%;
}

#label_rpl{
width: 8%;
margin-left: 43%;
  }


.sff{
float:left;
margin: -1px;
height: 11px;
font: 10px Arial;
margin: 1px 0;
text-transform: uppercase;
width: 100%;
border: none;
}
</style>
				<div id="capa_recibo">
             <div id="recibo_dentro">
              <div id="enc_recibo">
                <div id="img_enc">

                </div>
                <div id="txt_enc">
                <strong>SERVICIOS DE SALUD DE HIDALGO</strong><br>
                Jurisdicción Sanitaria No. 17 Zacualtipán, Hgo.<br>
                Solicitud de de Suministro de Combustible<br>
                Dirección Administrativa<br>
                </div>
                <div class="clearfix"></div>
              </div>
              <div id="capa_form_recibo">
              <form action="" id="recibo">

              <label for="fecha_recibo" class="leftfloat" id="label_fecha">FECHA:</label>
              <input type="text" id="fecha_recibo" class="leftfloat" readonly>
              <label for="fecha_recibo" class="leftfloat" id="label_fecha1" >DD-MM-AAAA</label>

              <label for="folio_recibo" class="leftfloat" id="label_folio">FOLIO:</label>
              <input type="text" id="folio_recibo" class="leftfloat" readonly><br>
<div class="clearfix"></div>
              <label for="area_recibo" class="leftfloat" id="label_area">AREA DEL SOLICITANTE:</label>
              <input type="text" id="area_recibo" class="leftfloat" readonly><br>
<div class="clearfix"></div>
              <label for="vehiculo_recibo" class="leftfloat" id="label_vehiculo">VEHICULO:</label>
              <input type="text" id="vehiculo_recibo" class="leftfloat" readonly >

              <label for="noeco_recibo" class="leftfloat" id="label_noeco">NO. ECO.:</label>
              <input type="text" id="noeco_recibo" class="leftfloat" readonly>

              <label for="cilindraje_recibo" class="leftfloat" id="label_cilindraje">CILINDRAJE: </label>
              <input type="text" id="cilindraje_recibo" class="leftfloat" readonly ><br>
<div class="clearfix"></div>
              <label for="ofcom_recibo" class="leftfloat" id="label_ofcom">OF. DE COMISION No.:</label>
              <input type="text" id="ofcom_recibo" class="leftfloat" readonly>

              <label for="comisionadoa_recibo" class="leftfloat" id="label_comisionadoa">COMISIONADO A:</label>
              <input type="text" id="comisionadoa_recibo" class="leftfloat" readonly><br>
<div class="clearfix"></div>
              <label for="recorridoaprox_recibo" class="leftfloat" id="label_recorrido">RECORRIDO APROXIMADO:</label>
              <input type="text" id="recorridoaprox_recibo" class="leftfloat" readonly>
              <label for="recorridoaprox_recibo" class="leftfloat" id="label_kmrecorrido">KM.:</label><br>
<div class="clearfix"></div>
              <label for="monto_recibo" class="leftfloat" id="label_monto">$:</label>
              <input type="text" id="monto_recibo" class="leftfloat" readonly>

              <label for="montoletra_recibo" class="leftfloat" id="label_montoletra">LETRA:</label>
              <input type="text" id="montoletra_recibo" class="leftfloat" readonly>

              <label for="litros_recibo" class="leftfloat" id="label_litros">LITROS:</label>
              <input type="text" id="litros_recibo" class="leftfloat" readonly>
<div class="clearfix"></div>
              </form>
              </div>
              <div id="capa_firmas_recibo">
                <div id="firma_1">
                 AUTORIZO</p>
                 ______________________<br>
                 <input type="text" id="firma1_recibo" class="sff" readonly>
                </div>
                <div id="firma_2">
                 Vo. Bo.</p>
                 ______________________<br>
                 <input type="text" id="firma2_recibo" class="sff" readonly>
                  
                </div>
                <div id="firma_3">
                RECIBI</p>
                _______________________<br>
                <input type="text" id="firma3_recibo" class="sff"  readonly>
                
                </div>
                <div class="clearfix"></div>
              </div>
             <div class="clearfix"></div>
             </div>

         </div>
         <div class="clearfix"></div>
         EOF;		

			}
						
			
     		 return ($html);
}

}/*termina if($conect->conectar()==true)*/
	
 }/*temina funcion*/

/*hacer primero*/

	$perfil="";
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sistema de Control de Vales Para Gasolina');
$pdf->SetTitle('Catalogo de Unidades de Transporte');
$pdf->SetSubject('Sistema Desarrollado por Carlos Montiel');
$pdf->SetKeywords('Catalogo, Gasolina, Unidades de Transporte');
$pdf->SetHeaderData('logo_bnco.png', '4%','CAT_U_T_'.date("Y-m-d"), 'Sistema de Control para Vales de Gasolina V-1.2');
$pdf->setHeaderFont(Array('courier', '', 3));

$arial = $pdf->addTTFfont('../font/arial.ttf', 'TrueTypeUnicode', '', 32);
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

$pdf->SetFont($arial, '', 7, '', true);

// Add a page 
// This method has several options, check the source code documentation for more information.
$pdf->setPrintHeader(true); //no imprime la cabecera ni la linea 
$pdf->setPrintFooter(true); // imprime el pie ni la linea 
$pdf->AddPage();

//*************
  ob_end_clean();//rompimiento de pagina
//************* 

$html = generarPDF($mes_ir,$anio_ir);
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
$nombre='Recibos_'.$mes_ir.'-'.$anio_ir.'_'.date("Y-m-d").'.pdf';
$pdf->Output($nombre, 'I');

return $pdf;
?>


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
.recibo_dentro{
  margin: 3%;
  width: 94%;
  height: 94%;
  border: 1px solid #999;
}
.enc_recibo{
  width: 100%;
  padding-bottom:2%; 
}
.img_enc{
  float: left;
  width: 73px;
  height: 73px;
  border: 1px solid #999;
  background:red;
}
.txt_enc{
float: left;
text-align: center;
margin: auto;
width: 50%;
font: 13px Arial;
margin-left: 15%;
}

</style>
        <div class="capa_rec">
            <div class="recibo_dentro">
            <div class="enc_recibo">

                <div class="img_enc">
                <img src="../img/ssh_logo.png">
                </div><!--termina imagen de encabezado capa-->

                <div class="txt_enc">
                <strong>SERVICIOS DE SALUD DE HIDALGO</strong><br>
                Jurisdicción Sanitaria No. 17 Zacualtipán, Hgo.<br>
                Solicitud de de Suministro de Combustible<br>
                Dirección Administrativa<br>
                </div><!--termina texto de encabezado-->

                </div><!--termina encabezado recibo-->

             </div><!--termina recibo dentro-->
         </div><!--termina capa recibo-->