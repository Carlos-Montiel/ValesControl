<!DOCTYPE HTML>
<html lang="es">
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Reportes</title>
<script>
            $(function(){
                  //Para escribir solo numeros    
                $('#novehiculo_rep').validCampos('0123456789');
                $('#anio_fv').validCampos('0123456789');  
                $('#anio_mr').validCampos('0123456789');  
                
                
                     
            });
        </script>
</head>
<body>
<div class="menus-principal" id="insertar">
<div class="menus"><a href="javascript:visible_oculto('realizar_reporte','catalogoUT', 'imprimirReciboss');">Bitácora </a> • <a href="javascript:visible_oculto('imprimirReciboss','catalogoUT','realizar_reporte');">Imprimir Recibos</a> • <span class="titulo-menu">Reportes</span> • <a href="javascript:visible_oculto('catalogoUT','realizar_reporte', 'imprimirReciboss');">Catálogo Unidades de Transporte</a><br>
</div>
</div>
<div class="menus-contenido">
<div id="realizar_reporte">
<h1 class="titulos"><span class="rojo">Bitácora de Vehiculo</span></h1>
 <div id="capa_form_vehiculo"><div id="bloquea" ><a href="javascript:desbloquea_rep();">Nueva Consulta</a></div>
  <div id="formulario_vehiculo">
              <form action="php/reportePDF.php" name="bitacora_vehiculo" id="bitacora_vehiculo" method="POST" target="_blank">
              <h4 class="leftfloat">Ingresa los datos para realizar la consulta:</h4><br><br><br>
                <div class="clearfix"></div>
              <label for="novehiculo_rep" class="leftfloat" id="label_repveh">No. de vehiculo:</label>
              <input type="text" id="novehiculo_rep" class="leftfloat" name="noecogr" maxlength="5" required>
              
              <label for="mes_fv" class="leftfloat" id="label_mesrep">Mes:</label>
              <select id="mes_fv" name="mes_fv" class="leftfloat" required>
                <option value="">SELECCIONA</option>
                <option value="ENERO">01-ENERO</option>
                <option value="FEBRERO">02-FEBRERO</option>
                <option value="MARZO">03-MARZO</option>
                <option value="ABRIL">04-ABRIL</option>
                <option value="MAYO">05-MAYO</option>
                <option value="JUNIO">06-JUNIO</option>
                <option value="JULIO">07-JULIO</option>
                <option value="AGOSTO">08-AGOSTO</option>
                <option value="SEPTIEMBRE">09-SEPTIEMBRE</option>
                <option value="OCTUBRE">10-OCTUBRE</option>
                <option value="NOVIEMBRE">11-NOVIEMBRE</option>
                <option value="DICIEMBRE">12-DICIEMBRE</option>
              </select>
<div class="clearfix"></div>
              <label for="anio_fv" class="leftfloat" id="label_aniorep">AÑO:</label>
              <input type="text" id="anio_fv" name="anio_fv" class="leftfloat" required>
</form>
</div>
<div class="clearfix"></div>
              <div id="opciones_consultar">

             <span class="boton_consultar"><a href="javascript:validaGR();" class="enlace_consultar">Aceptar</a></span>
         </div>
         <div class="clearfix"></div>

 <div class="clearfix"></div>
<div id="muestra_repimp"></div>
         <div class="clearfix"></div>
</div>
</div>
<div class="clearfix"></div>

<div id="imprimirReciboss">
<h1 class="titulos"><span class="amarillo">Imprimir Recibos</span></h1>
<div id="capa_form_irecibos"><div id="bloquea" ><a href="javascript:desbloquea_rep();">Nueva Consulta</a></div>

  <div id="formulario_vehiculo">
              <form action="php/recibosGeneraPDF.php" name="recibos_PDF" id="recibos_PDF" method="POST" target="_blank">
              <h4 class="leftfloat">Ingresa los datos para Mostrar Los Recibos:</h4>
                <div class="clearfix"></div><br>
              
              <label for="mes_mr" class="leftfloat" id="label_mesmr">Mes:</label>
              <select id="mes_mr" name="mes_mr" class="leftfloat" required>
                <option value="">SELECCIONA</option>
                <option value="ENERO">01-ENERO</option>
                <option value="FEBRERO">02-FEBRERO</option>
                <option value="MARZO">03-MARZO</option>
                <option value="ABRIL">04-ABRIL</option>
                <option value="MAYO">05-MAYO</option>
                <option value="JUNIO">06-JUNIO</option>
                <option value="JULIO">07-JULIO</option>
                <option value="AGOSTO">08-AGOSTO</option>
                <option value="SEPTIEMBRE">09-SEPTIEMBRE</option>
                <option value="OCTUBRE">10-OCTUBRE</option>
                <option value="NOVIEMBRE">11-NOVIEMBRE</option>
                <option value="DICIEMBRE">12-DICIEMBRE</option>
              </select>

              <label for="anio_mr" class="leftfloat" id="label_aniomr">AÑO:</label>
              <input type="text" id="anio_mr" name="anio_mr" class="leftfloat" required>
</form>
</div>
<div class="clearfix"></div>
              <div id="opciones_consultar">

             <span class="boton_consultar"><a href="javascript:validaIMPREC();" class="enlace_consultar">Aceptar</a></span>
         </div>
         <div class="clearfix"></div>



</div>

       </div><!--termina la segunda capa-->

<div class="clearfix"></div>

<div id="catalogoUT">
<h1 class="titulos"><span class="azul">Catálogo Unidades de Transporte</span></h1>
<div id="capa_form_icatalogo"><div id="bloquea" ><a href="javascript:desbloquea_rep();">Nueva Consulta</a></div>
<div id="formulario_vehiculo">
              <form action="php/reporteUTPDF.php" name="catalogout" id="catalogout" method="POST" target="_blank">
              <h4 class="leftfloat">Para Generar Presione Aceptar:</h4><br><br><br>
                <div class="clearfix"></div>
              <label for="elaborocut" class="leftfloat" id="label_elaborocut">Elaboró:</label>
              <input type="text" id="elaborocut" class="leftfloat" name="elaborocut" required value="  ING. JUAN PEDRO ZERON ARTEAGA" onclick="if(this.value==='ING. JUAN PEDRO ZERON ARTEAGA') this.value=''" onblur="if(this.value=='') this.value='ING. JUAN PEDRO ZERON ARTEAGA'">
</form>
</div>
<div class="clearfix"></div>
              <div id="opciones_consultar">

             <span class="boton_consultar"><a href="javascript:validaCUT();" class="enlace_consultar">Aceptar</a></span>
         </div>
         <div class="clearfix"></div>

 <div class="clearfix"></div>
<div id="muestra_repimp"></div>
         <div class="clearfix"></div>
</div>
       </div>
<div class="clearfix"></div>

        </div>
</body>

</html>