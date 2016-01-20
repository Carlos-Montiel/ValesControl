<!DOCTYPE HTML>
<html lang="es">
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Insertar</title>

</head>
<body>

 
<div class="menus-principal" id="insertar">
<div class="menus"><a href="javascript:visible_oculto('insertar_recibo','insertar_vehiculo');">Recibo </a> • <span class="titulo-menu">Insertar</span> • <a href="javascript:visible_oculto('insertar_vehiculo','insertar_recibo');">Vehiculo</a></div>
</div>
<div class="menus-contenido">


<div class="clearfix"></div>

    <div id="insertar_recibo">
           <h1 class="titulos"><span class="verde">Insertar Vale </span>/ <span class="amarillo">Recibo</span></h1>

      <div id="otros_datos_vehiculo" class="inputs">
        <form action="php/inserta.php" id="recibo" method="POST">
          <script>
            $(function(){
                  //Para escribir solo numeros    
                $('#preciogas_recibo').validCampos('0123456789.');
                $('#folio_recibo').validCampos('0123456789.');  
                $('#noeco_recibo').validCampos('0123456789.');
                $('#ofcom_recibo').validCampos('0123456789.');
                $('#monto_recibo').validCampos('0123456789.');
                $('#litros_recibo').validCampos('0123456789.');
                     $('#recorridoaprox_recibo').validCampos('0123456789.');
                     $('#noeco_vehiculo').validCampos('0123456789');
                     $('#modelo_vehiculo').validCampos('0123456789');
                     $('#km_vehiculo').validCampos('0123456789');
                     $('#tiposerv_vehiculo').validCampos('0123456789');
                     
            });
        </script>
        <script type="text/javascript">
            var fecha=new Date() 
            var anio=fecha.getYear() 
            if (anio < 1000) 
            anio+=1900 
            var mes=fecha.getMonth() 
            var arreglomes=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre")
      
      document.getElementById('mesag').innerHTML=">>>>>  "+arreglomes[mes]+" de "+anio+"  <<<<< </br></br>";
      </script> 
              <label for="preciogas_recibo" class="leftfloat" id="label_preciogas" ><div id="mesag"></div>PRECIO DE GASOLINA :  $ </label>
              <input type="text" id="preciogas_recibo" class="leftfloat" required maxlength="8" onblur="javascript:cambiar_precio_gas();">
               <div class="clearfix"></div>
DESTINO:<br>
              <label for="destinode_recibo" class="leftfloat" id="label_destinode">DE:</label>
              <input type="text" id="destinode_recibo" class="leftfloat" value="ZACUALTIPAN, HGO." onChange="if(this.value=='ZACUALTIPAN, HGO.') this.value='' " onblur="if(this.value=='') this.value='ZACUALTIPAN, HGO.'">

              <label for="destinoa_recibo" class="leftfloat" id="label_destinoa">A: </label>
              <input type="text" id="destinoa_recibo" class="leftfloat" autofocus><br>
               <div class="clearfix"></div>
              <label for="nomcon_recibo" class="leftfloat" id="label_nomcon">NOMBRE DE CONDUCTOR:</label>
              <input type="text" id="nomcon_recibo" class="leftfloat">
               <div class="clearfix"></div>
            </div>

         <div id="capa_recibo">
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
              <div id="capa_form_recibo" >
              <script>window.onclick=function(){
                precio_gas();

                folio_recibo();
                  };
                  </script>

              <label for="fecha_recibo" class="leftfloat" id="label_fecha">FECHA:</label>
              <input type="text" id="fecha_recibo" class="leftfloat" onblur="javascript:valida_fecha(this);">
              <label for="fecha_recibo" class="leftfloat" id="label_fecha1" >DD-MM-AAAA</label>

              <label for="folio_recibo" class="leftfloat" id="label_folio">FOLIO:</label>
              <input type="text" id="folio_recibo" class="leftfloat" maxlength="4" readonly value="0"><br>
<div class="clearfix"></div>
              <label for="area_recibo" class="leftfloat" id="label_area">AREA DEL SOLICITANTE:</label>
              <input type="text" id="area_recibo" class="leftfloat"><br>
<div class="clearfix"></div>
              <label for="vehiculo_recibo" class="leftfloat" id="label_vehiculo">VEHICULO:</label>
              <input type="text" id="vehiculo_recibo" class="leftfloat" readonly value="auto">

              <label for="noeco_recibo" class="leftfloat" id="label_noeco">NO. ECO.:</label>
              <input type="text" id="noeco_recibo" class="leftfloat" maxlength="5" onblur="javascript:verificar_noeco();">

              <label for="cilindraje_recibo" class="leftfloat" id="label_cilindraje">CILINDRAJE: </label>
              <input type="text" id="cilindraje_recibo" class="leftfloat" readonly value="auto"><br>
<div class="clearfix"></div>
              <label for="ofcom_recibo" class="leftfloat" id="label_ofcom">OF. DE COMISION No.:</label>
              <input type="text" id="ofcom_recibo" class="leftfloat" maxlength="5">

              <label for="comisionadoa_recibo" class="leftfloat" id="label_comisionadoa">COMISIONADO A:</label>
              <input type="text" id="comisionadoa_recibo" class="leftfloat"><br>
<div class="clearfix"></div>
              <label for="recorridoaprox_recibo" class="leftfloat" id="label_recorrido">RECORRIDO APROXIMADO:</label>
              <input type="text" id="recorridoaprox_recibo" class="leftfloat" maxlength="10" readonly value="AUTO">
              <label for="recorridoaprox_recibo" class="leftfloat" id="label_kmrecorrido">KM.:</label><br>
<div class="clearfix"></div>
              <label for="monto_recibo" class="leftfloat" id="label_monto">$:</label>
              <input type="text" id="monto_recibo" class="leftfloat" maxlength="10"  onblur="javascript:calcularLitros();">

              <label for="montoletra_recibo" class="leftfloat" id="label_montoletra">LETRA:</label>
              <input type="text" id="montoletra_recibo" class="leftfloat">

              <label for="litros_recibo" class="leftfloat" id="label_litros">LITROS:</label>
              <input type="text" id="litros_recibo" class="leftfloat" maxlength="10" readonly value="AUTO">
<div class="clearfix"></div>
              
              </div>
              <div id="capa_firmas_recibo">
                <div id="firma_1">
                 AUTORIZO</p>
                 ______________________<br>
                 <input type="text" id="firma1_recibo" class="sff" value="DR. B. GERARDO VIVANCO CORTEZ" onclick="if(this.value==='DR. B. GERARDO VIVANCO CORTEZ') this.value=''" onblur="if(this.value=='') this.value='DR. B. GERARDO VIVANCO CORTEZ'">
                </div>
                <div id="firma_2">
                 Vo. Bo.</p>
                 ______________________<br>
                 <input type="text" id="firma2_recibo" class="sff" value="L.C. LEOCADIA HERNANDEZ HDEZ" onclick="if(this.value==='L.C. LEOCADIA HERNANDEZ HDEZ') this.value=''" onblur="if(this.value=='') this.value='L.C. LEOCADIA HERNANDEZ HDEZ'">
                  
                </div>
                <div id="firma_3">
                RECIBI</p>
                _______________________<br>
                <input type="text" id="firma3_recibo" class="sff" value="ING. JUAN PEDRO ZERON ARTEAGA" onclick="if(this.value==='ING. JUAN PEDRO ZERON ARTEAGA') this.value=''" onblur="if(this.value=='') this.value='ING. JUAN PEDRO ZERON ARTEAGA'">
                
                </div>
                <div class="clearfix"></div>
              </div>
             <div class="clearfix"></div>
             </div>
         </div>
<label for="rpl_recibo" class="leftfloat" id="label_rpl">Rend. P/L:</label>
              <input type="text" id="rpl_recibo" class="leftfloat" maxlength="10" readonly>

         <div id="opciones_insertar">
             <span class="boton_guardar"><a id="btn_grdr_recibo" href="javascript:validarRecibo();" class="enlace_grdr">Guardar</a></span>
             <!--<span class="boton_imprimir"><a id="btn_imprmr_recibo" href="javascript:imprimirRecibo('capa_recibo');" class="enlace_print">Imprimir</a></span>!-->
             <span class="boton_nuevo"><a id="btn_nvo_recibo" href="javascript:reiniciar_recibo();" class="enlace_nuevo">Nuevo</a></span>
         </div>
         <div class="clearfix"></div>
         <div id="recibo_inf">
            <div class="info_vehiculo">
<details> 
<summary>Informacion del Vehiculo:<br></summary>
No Eco: <span id="n_e_v_r" class="respuestas_1"></span><br>
No. Inv: <span id="n_i_v_r" class="respuestas_1"></span><br>
Localidad: <span id="l_v_r" class="respuestas_1"></span><br>
Municipio: <span id="mu_v_r" class="respuestas_1"></span><br>
Marca: <span id="ma_v_r" class="respuestas_1"></span><br>
Tipo: <span id="t_v_r" class="respuestas_1"></span><br>
Modelo: <span id="mo_v_r" class="respuestas_1"></span><br>
Placas: <span id="pl_v_r" class="respuestas_1"></span><br>
No. Id. Vehicular: <span id="n_i_v_v_r" class="respuestas_1"></span><br>
No. Motor: <span id="n_m_v_r" class="respuestas_1"></span><br>
No. Cilintros: <span id="n_c_v_r" class="respuestas_1"></span><br>
Rendimiento p/litro: <span id="r_pl_v_r" class="respuestas_1"></span><br>
</details>   
</div>
<div class="info_vehiculo">
  <details>
<summary>Seguro Vehicular<br></summary>
Aseguradora: <span id="as_v_r" class="respuestas_1"></span><br>
Poliza: <span id="po_v_r" class="respuestas_1"></span><br>
Exped: <span id="exp_v_r" class="respuestas_1"></span><br>
Vigencia: <span id="vi_v_r" class="respuestas_1"></span><br><br>
Verificacion: <span id="ve_v_r"class="respuestas_1"></span><br>
Tipo de Serv: <span id="t_s_v_r" class="respuestas_1"></span><br>
Edo. Fisico: <span id="e_f_v_r" class="respuestas_1"></span><br>
            </div>
  </details>
         </div>
         <div class="clearfix"></div>
         
         </form>
         <div id="mostrar"><?php include('../php/reciboMuestra.php');?></div>
         <div class="clearfix"></div>
    </div>







<div class="clearfix"></div>
<div id="insertar_vehiculo">
<h1 class="titulos"><span class="verde">Insertar Vehiculo</span></h1>
 <div id="capa_form_recibo">
  <div id="formulario_vehiculo">
              <form action="" id="vehiculo">
              <h4 class="leftfloat">Ingresa los datos que se piden a continuacion:</h6> (Obligatorios)<p>
                <div class="clearfix"></div>
              <label for="noeco_vehiculo" class="leftfloat" id="label_noecov">No. Eco:</label>
              <input type="text" id="noeco_vehiculo" class="leftfloat" maxlength="5" required="">

              <label for="noinv_vehiculo" class="leftfloat" id="label_noinv">No. Inv.:</label>
              <input type="text" id="noinv_vehiculo" class="leftfloat">
<div class="clearfix"></div>
              <label for="localidad_vehiculo" class="leftfloat" id="label_localidad">Localidad:</label>
              <input type="text" id="localidad_vehiculo" class="leftfloat">

              <label for="municipio_vehiculo" class="leftfloat" id="label_municipio">Municipio:</label>
              <input type="text" id="municipio_vehiculo" class="leftfloat">
<div class="clearfix"></div>
              <label for="marca_vehiculo" class="leftfloat" id="label_marca">Marca:</label>
              <input type="text" id="marca_vehiculo" class="leftfloat">

              <label for="tipo_vehiculo" class="leftfloat" id="label_tipo">Tipo:</label>
              <input type="text" id="tipo_vehiculo" class="leftfloat">
<div class="clearfix"></div>
              <label for="modelo_vehiculo" class="leftfloat" id="label_modelo">Modelo:</label>
              <input type="text" id="modelo_vehiculo" class="leftfloat">
<div class="clearfix"></div>
              <label for="placas_vehiculo" class="leftfloat" id="label_placas">Placas:</label>
              <input type="text" id="placas_vehiculo" class="leftfloat">

              <label for="noid_vehiculo" class="leftfloat" id="label_noid">No. de Id. Vehicular:</label>
              <input type="text" id="noid_vehiculo" class="leftfloat">
<div class="clearfix"></div>
              <label for="nomotor_vehiculo" class="leftfloat" id="label_nomotor">No. de Motor:</label>
              <input type="text" id="nomotor_vehiculo" class="leftfloat">

              <label for="nocilintros_vehiculo" class="leftfloat" id="label_nocilintros">No. de Cilintros:</label>
              <select id="nocilintros_vehiculo" class="leftfloat" onblur="javascript:calcularpl();">
                <option value="">Selecciona</option>
              <option value="4">4</option>
              <option value="6">6</option>
              <option value="8">8</option>
              </select><br>
<div class="clearfix"></div>
               <h4 class="leftfloat">Seguro Vehicular:</h6>
<div class="clearfix"></div><p>
              <label for="aseguradora_vehiculo" class="leftfloat" id="label_aseguradora">Aseguradora:</label>
              <input type="text" id="aseguradora_vehiculo" class="leftfloat">

              <label for="poliza_vehiculo" class="leftfloat" id="label_poliza">Poliza:</label>
              <input type="text" id="poliza_vehiculo" class="leftfloat">
<div class="clearfix"></div>
              <label for="exped_vehiculo" class="leftfloat" id="label_exped">Exped.:</label>
              <input type="text" id="exped_vehiculo" class="leftfloat" onblur="javascript:valida_fecha1(this);">

              <label for="exped_vehiculo" class="leftfloat" id="label_fecha11" ><-- AAAA-MM-DD --></label>

              <label for="vigencia_vehiculo" class="leftfloat" id="label_vigencia">Vigencia:</label>
              <input type="text" id="vigencia_vehiculo" class="leftfloat" onblur="javascript:valida_fecha2(this);">
<div class="clearfix"></div><p> <p>
              <label for="verificacion_vehiculo" class="leftfloat" id="label_verificacion">Verificacion:</label>
              <input type="month" id="verificacion_vehiculo" class="leftfloat">
<div class="clearfix"></div>
              
              <label for="km_vehiculo" class="leftfloat" id="label_km">Kilometraje:</label>
              <input type="text" id="km_vehiculo" class="leftfloat">

              <label for="renl_vehiculo" class="leftfloat" id="label_renl">Rendimiento Km/l:</label>
              <input type="text" id="renl_vehiculo" class="leftfloat" maxlength="4" readonly><br>
              
<div class="clearfix"></div>
              <label for="tiposerv_vehiculo" class="leftfloat" id="label_tiposerv">Tipo de Servicio:</label>
              <input type="text" id="tiposerv_vehiculo" class="leftfloat" maxlength="2" onblur="javascript:tiposerv();">

              <label for="edofisico_vehiculo" class="leftfloat" id="label_edofisico">Estado Fisico:</label>
              <input type="text" id="edofisico_vehiculo" class="leftfloat"><br>

<div class="clearfix"></div>
<span id="mstrats"></span>
<div class="clearfix"></div>
</form>
</div>
</div>
<div class="clearfix"></div>

<div class="clearfix"></div>
         <div id="opciones_insertar">
             <span class="boton_guardar"><a id="btn_grdr_vehi" href="javascript:validarVehiculo();" class="enlace_grdr">Guardar</a></span>
              <span class="boton_nuevo"><a id="btn_nvo_vehiculo" href="javascript:reiniciarFormVehiculo();" class="enlace_nuevo">Nuevo</a></span>
         </div>
         <div class="clearfix"></div>
         <div id="mostrar1"><?php include('../php/unidad_de_transporte_Muestra.php');?></div>
         <div class="clearfix"></div>


</div>
</body>

</html>