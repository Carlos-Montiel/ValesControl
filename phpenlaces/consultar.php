<!DOCTYPE HTML>
<html lang="es">
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Consultar</title>
<script>
            $(function(){
                  //Para escribir solo numeros    
                $('#folio_rep_cons').validCampos('0123456789');
                $('#anio_consulta').validCampos('0123456789');
                $('#folio_consulta').validCampos('0123456789');
                $('#anio_consulta_vale').validCampos('0123456789');
                $('#novale_cons').validCampos('0123456789');
                
                     
            });
        </script>

</head>
<body>



<div class="menus-principal" id="consultar">
<div class="menus"><span class="relleno"><a href="javascript:visible_oculto('consultar_reporte','consultar_recibo','consultar_vale','consultar_vehiculo');">Bitácora </a> • <a href="javascript:visible_oculto('consultar_recibo','consultar_reporte','consultar_vale','consultar_vehiculo');">Recibo </a> •   <span class="titulo-menu">Consultar</span>   • <a href="javascript:visible_oculto('consultar_vale','consultar_reporte','consultar_recibo','consultar_vehiculo');">Vale</a> • <a href="javascript:visible_oculto('consultar_vehiculo','consultar_reporte','consultar_recibo','consultar_vale');">Vehiculo</a></span></div>
</div>
<div class="menus-contenido">


<div class="clearfix"></div>
<div id="consultar_reporte">
<h1 class="titulos"><span class="azul">Consultar Bitácora de Vehiculo Hecha</span></h1>
 <div id="capa_form_recibo">
  <div id="formulario_vehiculo">
              <form action="" id="consulta_rep">
              <h4 class="leftfloat">Ingresa un numero de folio de la lista:</h6>
                <div class="clearfix"></div>
              <label for="folio_rep_cons" class="leftfloat" id="label_frc">Folio Bitácora:</label>
              <input type="text" id="folio_rep_cons" class="leftfloat" maxlength="4">
              <div class="clearfix"></div>
              <div id="opciones_consultar" >
             <span class="boton_consultar"><a href="javascript:validaConsultarReporte();" class="enlace_consultar">Consultar</a></span>
         </div>
         <div class="clearfix"></div>

<div id="mostrar"><?php include('../php/reporteMuestra.php');?></div>
         <div class="clearfix"></div>

<div class="clearfix"></div>
</form>

<div id="resultado_consulta_reporte" class="efecto3">  
<img id="disenio_hoja" src="./img/disenio_hoja.png">
<div class="clearfix"></div>
<div id="resultado_consulta_reporte-dentro">
  Reporte
</div>
<div class="clearfix"></div>
</div>
<div id="opciones_insertar" class="btns_desact">
             <span class="boton_eliminar"><a id="btn_eliminar" href="javascript:eliminaReporte();" class="enlace_eliminar">Eliminar</a></span>
         </div>
         <div class="clearfix"></div>
<div class="clearfix"></div>
 </div>
</div>
<div class="clearfix"></div>
        
</div>



<div id="consultar_recibo">
<h1 class="titulos"><span class="azul">Consultar Recibos</span></h1>
 <div id="capa_form_recibo">
  <div id="formulario_vehiculo">
              <form action="" id="consultar_recib">
              <h4 class="leftfloat">Ingresa un año e inserta un numero de folio de la lista:</h6><p>
                <div class="clearfix"></div>
              <label for="anio_consulta" class="leftfloat" id="label_anioc">Año:</label>
              <input type="text" id="anio_consulta" class="leftfloat" maxlength="4">
              <div class="clearfix"></div>
              <label for="folio_consulta" class="leftfloat" id="label_fc">Folio de Recibo:</label>
              <input type="text" id="folio_consulta" class="leftfloat" maxlength="4">
              <div class="clearfix"></div>
              <div id="opciones_consultar">
             <span class="boton_consultar"><a href="javascript:validaConsultarRecibo();" class="enlace_consultar">Consultar</a></span>
         </div>
         <div class="clearfix"></div>
<div id="mostrar1"><?php include('../php/reciboMuestra.php');?></div>
         <div class="clearfix"></div>
<div class="clearfix"></div>
</form>
<div class="clearfix"></div>
 </div>
</div>
<div class="clearfix"></div>
  <div id="capa_recibo">
    <div id="text_av"></div>
             <div id="recibo_dentro">

              <div id="enc_recibo">
                <div id="img_enc">
                <img src="img/ssh_logo.png">
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
        <div id="opciones_insertar1" class="btns_desact">
             <span class="boton_eliminar"><a id="btn_eliminar" href="javascript:eliminaRecibo();" class="enlace_eliminar">Eliminar</a></span>
         </div>
         
         <div class="clearfix"></div>
</div>
<div class="clearfix"></div>


<div id="consultar_vale">
<h1 class="titulos"><span class="azul">Consultar Vale</span></h1>
 <div id="capa_form_vale">
  <div id="formulario_vehiculo">
              <form action="" id="consulta_vale">
              <h4 class="leftfloat">Ingresa un numero de vale de la lista:</h6>
                <div class="clearfix"></div>
                <label for="anio_consulta_vale" class="leftfloat" id="label_aniocv">Año:</label>
              <input type="text" id="anio_consulta_vale" class="leftfloat" maxlength="4">
               <div class="clearfix"></div>
              <label for="novale_cons" class="leftfloat" id="label_nvc">Numero de vale:</label>
              <input type="text" id="novale_cons" class="leftfloat" maxlength="6">
<div class="clearfix"></div>
              <div id="opciones_consultar">
             <span class="boton_consultar"><a href="javascript:validaConsultarVale();" class="enlace_consultar">Consultar</a></span>
         </div>
         <div class="clearfix"></div>

<div id="mostrar2"><?php include('../php/valeMuestra.php');?></div>
         <div class="clearfix"></div>

<div id="resultado_consulta_vale" class="efecto3">  
<img id="disenio_hoja" src="./img/disenio_hoja.png">
<div class="clearfix"></div>
<div id="resultado_consulta_vale-dentro">
  Vale
</div>
<div class="clearfix"></div>
</div>

<div class="clearfix"></div>
</form>
<div class="clearfix"></div>
 </div>
</div>
<div class="clearfix"></div>
<div id="opciones_insertar2" class="btns_desact">
             <span class="boton_eliminar"><a id="btn_eliminar" href="javascript:eliminaVale();" class="enlace_eliminar">Eliminar</a></span>
         </div>
         
         <div class="clearfix"></div>
</div>


<div id="consultar_vehiculo">
<h1 class="titulos"><span class="azul">Consultar Vehiculo</span></h1>
 <div id="capa_form_vehiculo">
  <div id="formulario_vehiculo">
              <form action="" id="consulta_vale">
              <h4 class="leftfloat">Ingresa un numero de Vehiculo de la lista:</h6>
                <div class="clearfix"></div>
              <label for="novehiculo_cons" class="leftfloat" id="label_nvehc">Numero de vehiculo:</label>
              <input type="text" id="novehiculo_cons" class="leftfloat" maxlength="5">
<div class="clearfix"></div>
              <div id="opciones_consultar">
             <span class="boton_consultar"><a href="javascript:validaConsultarVehiculo();" class="enlace_consultar">Consultar</a></span>
         </div>
         <div class="clearfix"></div>

<div id="mostrar3"><?php include('../php/unidad_de_transporte_Muestra.php');?></div>
         <div class="clearfix"></div>

<div class="clearfix"></div>
</form>
<div id="resultado_consulta_vehiculo" class="efecto3">  
<img id="disenio_hoja" src="./img/disenio_hoja.png">
<div class="clearfix"></div>
<div id="resultado_consulta_vehiculo-dentro" >
  Unidad de Transporte
</div>
<div class="clearfix"></div>
</div>
<div id="opciones_insertar3" class="btns_desact">
             <span class="boton_eliminar"><a id="btn_eliminar" href="javascript:eliminaVehiculo();" class="enlace_eliminar">Eliminar</a></span>
         </div>
         
         <div class="clearfix"></div>
<div class="clearfix"></div>
 </div>
</div>
<div class="clearfix"></div>

</div>

 </div>

</div>

</body>

</html>