/*para que se mueva el titulo de la pagina*/
var txt=" -- Sistema de Control para Vales de Gasolina Jurisdicción No. 17 --   ";
var espera=300;
var refresco=null;
function rotulo_title() {
        document.title=txt;
        txt=txt.substring(1,txt.length)+txt.charAt(0);
        refresco=setTimeout("rotulo_title()",espera);}
rotulo_title();

/*respaldo:*/
function file_exists (url) {
  var req = crearObjeto();
  // HEAD Results are usually shorter (faster) than GET
 req.open('HEAD', url, false);
  req.send(null);
  if (req.status == 200) {
    return true;
  }

  return false;
}

function respaldo(){
	fecharesp=new Date();
	var anioresp=fecharesp.getYear();
            if (anioresp < 1000) {
            anioresp+=1900; 
        }
         var mesresp=fecharesp.getMonth();
         var arreglomesresp=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
   var archivo = "sql/Control_de_vales_"+arreglomesresp[mesresp]+"-"+anioresp+".sql";
fechanombre="Control_de_vales_"+arreglomesresp[mesresp]+"-"+anioresp;
if(file_exists(archivo)){
   /*alert("Ya existe el Respaldo");*/
}else {
datosRespaldo="datosRespaldo="+fechanombre;
solicitud_respaldo=crearObjeto();
solicitud_respaldo.open("POST", "./php/bdRespaldo.php",true);
solicitud_respaldo.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitud_respaldo.setRequestHeader("length", datosRespaldo.length);
solicitud_respaldo.setRequestHeader("Connection", "close");
solicitud_respaldo.addEventListener("load", respuestaRespaldo, false);
solicitud_respaldo.send(datosRespaldo);


 }

}

function respuestaRespaldo(){
	NewBox.alert(solicitud_respaldo.responseText);
}

/*para cambiar (ocultar) las opciones como insertar recibo insertar vehiculo etc*/
function visible_oculto(visible,oculto,oculto1,oculto2){
document.getElementById(visible).style.display ='block';
document.getElementById(oculto).style.display = 'none';
document.getElementById(oculto1).style.display = 'none';
document.getElementById(oculto2).style.display = 'none';
}

/*cambiar apariencia iniciar sesion*/
function colorc(){
	document.getElementById('msj-login').style.fontWeight='bold';
	document.getElementById('password_user').focus();

	}


/*funcion Imprimir Recibo*/
function imprimirRecibo(imp){
	var recibo=document.getElementById(imp);
	var ventimp = window.open(' ', 'popimpr');
	ventimp.document.write( recibo.innerHTML );
	var css = ventimp.document.createElement("link");
css.setAttribute("href", "./css/style.css");
css.setAttribute("rel", "stylesheet");
css.setAttribute("type", "text/css");
ventimp.document.head.appendChild(css);
ventimp.document.close();
ventimp.print( );
ventimp.close();
}

/*>>>>>>>>>>>>>>>>>>>>>>>>>----AJAX----<<<<<<<<<<<<<<<<<<<<<<<<<*/
/*crear el objeto*/
	function crearObjeto()
	{
		var obj;
		if (window.XMLHttpRequest) 
			{ 
				obj=new XMLHttpRequest();
			} 
			else 
			{ 
				obj=new ActiveXObject("Microsoft.XMLHTTP"); 
			}
		return obj;
	}
	
/*Insertamos el recibo*/
function insertarRecibo(){

$('#timer').fadeIn(300);
	/*se obtienen los valores */
	folio_recibo=document.getElementById('folio_recibo').value;

	destinoa_recibo=document.getElementById('destinoa_recibo').value;

	fecha_recibo=document.getElementById('fecha_recibo').value;
	
	fecha_recibo_array=fecha_recibo.split("-");

	f_dia_recibo=fecha_recibo_array[0];
	f_mes_recibo=fecha_recibo_array[1];
	if(f_mes_recibo==01){
    f_mes_recibo="Enero";
	}else if (f_mes_recibo==02) {
		f_mes_recibo="Febrero";
	}else if(f_mes_recibo==03){
f_mes_recibo="Marzo";
	}else if(f_mes_recibo==04){
f_mes_recibo="Abril";
	}else if(f_mes_recibo==05){
f_mes_recibo="Mayo";
	}else if(f_mes_recibo==06){
f_mes_recibo="Junio";
	}else if(f_mes_recibo==07){
f_mes_recibo="Julio";
	}else if(f_mes_recibo==08){
f_mes_recibo="Agosto";
	}else if(f_mes_recibo==09){
f_mes_recibo="Septiembre";
	}else if(f_mes_recibo==10){
f_mes_recibo="Octubre";
	}else if(f_mes_recibo==11){
f_mes_recibo="Noviembre";
	}else if(f_mes_recibo==12){
f_mes_recibo="Diciembre";
	};
	f_anio_recibo=fecha_recibo_array[2];

	area_recibo=document.getElementById('area_recibo').value;
	noeco_recibo=document.getElementById('noeco_recibo').value;
	ofcom_recibo=document.getElementById('ofcom_recibo').value;
	novale=document.getElementById('folio_recibo').value;
	recorridoaprox_recibo=document.getElementById('recorridoaprox_recibo').value;
	monto_recibo=document.getElementById('monto_recibo').value;
	montoletra_recibo=document.getElementById('montoletra_recibo').value;
	litros_recibo=document.getElementById('litros_recibo').value;
	firma1_recibo=document.getElementById('firma1_recibo').value;
	firma2_recibo=document.getElementById('firma2_recibo').value;
	firma3_recibo=document.getElementById('firma3_recibo').value;
/*se guardan en un arreglo*/
    datos_rec_env="folio_recibo="+folio_recibo+"&f_dia_recibo="+f_dia_recibo+"&f_mes_recibo="+f_mes_recibo+
  "&f_anio_recibo="+f_anio_recibo+"&area_recibo="+area_recibo+"&noeco_recibo="+noeco_recibo+"&ofcom_recibo="+ofcom_recibo+
  "&novale="+novale+"&recorridoaprox_recibo="+recorridoaprox_recibo+"&monto_recibo="+monto_recibo+"&montoletra_recibo="+montoletra_recibo+
  "&litros_recibo="+litros_recibo+"&firma1_recibo="+firma1_recibo+"&firma2_recibo="+firma2_recibo+"&firma3_recibo="+firma3_recibo+
  "&destinoa_recibo="+destinoa_recibo;
/*se hace la peticion*/
solicitud_1=crearObjeto();
solicitud_1.open("POST", "./php/reciboInserta.php", true);
solicitud_1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
solicitud_1.setRequestHeader("Content-length", datos_rec_env.length);
solicitud_1.setRequestHeader("Connection", "close"); 
solicitud_1.addEventListener('load', msj1, false);
solicitud_1.send(datos_rec_env);
insertar_vale ();
}


function nvorecibo(){
	document.getElementById('folio_recibo').value=0;
folio_recibo();

}

function insertar_vale(){
	no_vale=document.getElementById('folio_recibo').value;
fecha_vale=document.getElementById('fecha_recibo').value;
	
	fecha_vale_array=fecha_vale.split("-");

	f_dia_vale=fecha_vale_array[0];
	f_mes_vale=fecha_vale_array[1];
	if(f_mes_vale==01){
    f_mes_vale="Enero";
	}else if (f_mes_vale==02) {
		f_mes_vale="Febrero";
	}else if(f_mes_vale==03){
f_mes_vale="Marzo";
	}else if(f_mes_vale==04){
f_mes_vale="Abril";
	}else if(f_mes_vale==05){
f_mes_vale="Mayo";
	}else if(f_mes_vale==06){
f_mes_vale="Junio";
	}else if(f_mes_vale==07){
f_mes_vale="Julio";
	}else if(f_mes_vale==08){
f_mes_vale="Agosto";
	}else if(f_mes_vale==09){
f_mes_vale="Septiembre";
	}else if(f_mes_vale==10){
f_mes_vale="Octubre";
	}else if(f_mes_vale==11){
f_mes_vale="Noviembre";
	}else if(f_mes_vale==12){
f_mes_vale="Diciembre";
	};
	f_anio_vale=fecha_vale_array[2];

noeco_vale=document.getElementById('noeco_recibo').value;
recorridoaprox_vale=document.getElementById('recorridoaprox_recibo').value;
/*kinicial y kfinal*/

ofcom_vale=document.getElementById('ofcom_recibo').value;
monto_vale=document.getElementById('monto_recibo').value;
litros_vale=document.getElementById('litros_recibo').value;
preciogas_vale=document.getElementById('preciogas_recibo').value;
consumopl_vale=document.getElementById('preciogas_recibo').value;
/*renpl_vale*/
dde_vale=document.getElementById('destinode_recibo').value;
da_vale=document.getElementById('destinoa_recibo').value;
conductor_vale=document.getElementById('nomcon_recibo').value;

datos_valeop="noeco_vale="+noeco_vale+"&recorridoaprox_vale="+recorridoaprox_vale;

solicitud_valeop=crearObjeto();
solicitud_valeop.open("POST", "./php/operacionesvaleInserta.php", true);
solicitud_valeop.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
solicitud_valeop.setRequestHeader("length", datos_valeop.length);
solicitud_valeop.setRequestHeader("Connection", "close");
solicitud_valeop.addEventListener("load", regresa_valeop, false);
solicitud_valeop.send(datos_valeop);

}

function regresa_valeop(){
	lista_dvr= JSON.parse(solicitud_valeop.responseText);
	kinicial_vale=lista_dvr['kinicial_vale'];
kfinal_vale=lista_dvr['kfinal_vale'];
renpl_vale=lista_dvr['renpl_vale'];

datos_vale_env="no_vale="+no_vale+"&f_dia_vale="+f_dia_vale+"&f_mes_vale="+f_mes_vale+"&f_anio_vale="+f_anio_vale+
"&noeco_vale="+noeco_vale+"&kinicial_vale="+kinicial_vale+"&kfinal_vale="+kfinal_vale+"&recorridoaprox_vale="+recorridoaprox_vale+
"&ofcom_vale="+ofcom_vale+"&monto_vale="+monto_vale+"&litros_vale="+litros_vale+"&preciogas_vale="+preciogas_vale+
"&consumopl_vale="+consumopl_vale+"&renpl_vale="+renpl_vale+"&dde_vale="+dde_vale+"&da_vale="+da_vale+"&conductor_vale="+conductor_vale;

solicitud_inserta_vale=crearObjeto();
solicitud_inserta_vale.open("POST", "./php/valeInserta.php",true);
solicitud_inserta_vale.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitud_inserta_vale.setRequestHeader("length", datos_vale_env.length);
solicitud_inserta_vale.setRequestHeader("Connection", "close");
solicitud_inserta_vale.addEventListener("load", respuesta_vale, false);
solicitud_inserta_vale.send(datos_vale_env);

solicitud_actualizakm=crearObjeto();

}


function respuesta_vale(){
	$('#timer').fadeOut(300);
/*para la primera solicitud*/
	if(solicitud_inserta_vale.readyState=4)
  {
  	lista_insertavale = JSON.parse(solicitud_inserta_vale.responseText);
  	NewBox.alert(lista_insertavale['informe']);
  	document.getElementById('mostrar').innerHTML=lista['tabla'];
  	/*NewBox.alert(lista_insertavale['informe1']);*/
 
  }else{
  	alert("Registro no insertado Intente otra vez");
  }
}

/*Insertamos el recibo*/
function insertarVehiculo(){
$('#timer').fadeIn(300);
noeco_vehiculo=document.getElementById('noeco_vehiculo').value;
noinv_vehiculo=document.getElementById('noinv_vehiculo').value;
localidad_vehiculo=document.getElementById('localidad_vehiculo').value;
municipio_vehiculo=document.getElementById('municipio_vehiculo').value;
marca_vehiculo=document.getElementById('marca_vehiculo').value;
tipo_vehiculo=document.getElementById('tipo_vehiculo').value;
modelo_vehiculo=document.getElementById('modelo_vehiculo').value;
placas_vehiculo=document.getElementById('placas_vehiculo').value;
noid_vehiculo=document.getElementById('noid_vehiculo').value;
nomotor_vehiculo=document.getElementById('nomotor_vehiculo').value;
nocilintros_vehiculo=document.getElementById('nocilintros_vehiculo').value;
aseguradora_vehiculo=document.getElementById('aseguradora_vehiculo').value;
poliza_vehiculo=document.getElementById('poliza_vehiculo').value;
exped_vehiculo=document.getElementById('exped_vehiculo').value;
vigencia_vehiculo=document.getElementById('vigencia_vehiculo').value;
verificacion_vehiculo=document.getElementById('verificacion_vehiculo').value;
km_vehiculo=document.getElementById('km_vehiculo').value;
renl_vehiculo=document.getElementById('renl_vehiculo').value;
tiposerv_vehiculo=document.getElementById('tiposerv_vehiculo').value;
edofisico_vehiculo=document.getElementById('edofisico_vehiculo').value;


datos_veh_enviar="noeco_vehiculo="+noeco_vehiculo+"&noinv_vehiculo="+noinv_vehiculo+"&localidad_vehiculo="+localidad_vehiculo+
"&municipio_vehiculo="+municipio_vehiculo+"&marca_vehiculo="+marca_vehiculo+"&tipo_vehiculo="+tipo_vehiculo+"&modelo_vehiculo="+
modelo_vehiculo+"&placas_vehiculo="+placas_vehiculo+"&noid_vehiculo="+noid_vehiculo+"&nomotor_vehiculo="+nomotor_vehiculo+"&nocilintros_vehiculo="+
nocilintros_vehiculo+"&aseguradora_vehiculo="+aseguradora_vehiculo+"&poliza_vehiculo="+poliza_vehiculo+"&exped_vehiculo="+exped_vehiculo+
"&vigencia_vehiculo="+vigencia_vehiculo+"&verificacion_vehiculo="+verificacion_vehiculo+"&km_vehiculo="+km_vehiculo+"&renl_vehiculo="+renl_vehiculo+
"&tiposerv_vehiculo="+tiposerv_vehiculo+"&edofisico_vehiculo="+edofisico_vehiculo;
/*enviamos al archivo php con post*/
solicitud_2=crearObjeto();/*guardamos el objeto en una variable*/
solicitud_2.open("POST", "./php/unidad_de_transporteInserta.php", true);
solicitud_2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitud_2.setRequestHeader("Content-length",datos_veh_enviar.length);
solicitud_2.setRequestHeader("Connection", "close");
solicitud_2.addEventListener('load', msj2, false);
solicitud_2.send(datos_veh_enviar);
}




/*mensaje a mostrar*/
function msj1(){
$('#timer').fadeOut(300);
/*para la primera solicitud*/
	if(solicitud_1.readyState=4)
  {
  	lista = JSON.parse(solicitud_1.responseText);
  	NewBox.alert(lista['informe']);
  	document.getElementById('mostrar').innerHTML=lista['tabla'];
 
  }else{
  	alert("Registro no insertado Intente otra vez");
  }
}

function msj2(){ 
	$('#timer').fadeOut(300);
/*para la segunda solicitud*/
  if(solicitud_2.readyState=4)
  {
  	lista = JSON.parse(solicitud_2.responseText);
  	NewBox.alert(lista['informe']);
  	document.getElementById('mostrar1').innerHTML=lista['tabla'];
 /*  NewBox.alert(solicitud_2.responseText);*/
 
  }else{
  	alert("Registro no insertado Intente otra vez");
  }
}

/*funcion para verificar tipo de servicio*/
function tiposerv(){
	tsv=document.getElementById('tiposerv_vehiculo').value;
	tsve="tsve="+tsv;
solicitudvts=crearObjeto();
$('#timer').fadeIn(300);
solicitudvts.open("POST", "./php/verificarTS.php", true);
solicitudvts.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudvts.setRequestHeader("Content-lenght", tsve.length);
solicitudvts.setRequestHeader("Connection", "close");
solicitudvts.addEventListener("load", respvts, false);
solicitudvts.send(tsve);
	$('#timer').fadeOut(300);
}

function respvts(){
	listavts=JSON.parse(solicitudvts.responseText);
	document.getElementById('mstrats').innerHTML=listavts['informe'];
}

/*para cambiar el precio de la gasolina por mes*/

function cambiar_precio_gas(){
	document.getElementById('preciogas_recibo').style.border="1px solid gray";
valg=document.getElementById('preciogas_recibo').value;
var fecha=new Date(); 
            var anio=fecha.getYear(); 
            if (anio < 1000); 
            anio+=1900; 
            var mes=fecha.getMonth(); 
            var arreglomes=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

mes_gas=arreglomes[mes];
anio_gas=anio;
datos_envpcpg="preciogas_recibo="+valg+"&mes_gas="+mes_gas+"&anio_gas="+anio_gas;

solicitudcmbrpg=crearObjeto();
$('#timer').fadeIn(300);
solicitudcmbrpg.open("POST","./php/valida_recibo1-3.php", true);
solicitudcmbrpg.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
solicitudcmbrpg.setRequestHeader("Content-length", datos_envpcpg.length);
solicitudcmbrpg.setRequestHeader("Connection", "close");
solicitudcmbrpg.addEventListener("load", cambiar_precio_gas_resp, false);
solicitudcmbrpg.send(datos_envpcpg);
$('#timer').fadeOut(300);
	}

function cambiar_precio_gas_resp(){
if(solicitudcmbrpg.readyState=4)
  {

  	listacmbrpg = JSON.parse(solicitudcmbrpg.responseText);
  	
  	NewBox.alert(listacmbrpg['informecmpg']);

  }else{
  	alert("Error AJAX");
  }
}




function precio_gas(){
	define=document.getElementById('folio_recibo').value;
  		if (define==0) {
val_orig_g=document.getElementById('preciogas_recibo').value;
if (val_orig_g=="") {
	var fecha=new Date(); 
            var anio=fecha.getYear(); 
            if (anio < 1000); 
            anio+=1900; 
            var mes=fecha.getMonth(); 
            var arreglomes=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

mes_gas=arreglomes[mes];
anio_gas=anio;
		datos_env5="preciogas_recibo="+val_orig_g+"&mes_gas="+mes_gas+"&anio_gas="+anio_gas;

solicitud5=crearObjeto();
$('#timer').fadeIn(300);
solicitud5.open("POST", "./php/valida_recibo1-2.php", true);
solicitud5.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitud5.setRequestHeader("Content-lenght", datos_env5.length);
solicitud5.setRequestHeader("Connection", "close");
solicitud5.addEventListener("load", respuesta_pgr, false);
solicitud5.send(datos_env5);
	$('#timer').fadeOut(300);
	};
	 }
}

function respuesta_pgr(){


	if(solicitud5.readyState=4)
  {

  	listapgr = JSON.parse(solicitud5.responseText);
  	precio_gas_recibido=listapgr['preciogas'];
  	if (precio_gas_recibido=="") {
  		define=document.getElementById('folio_recibo').value;
  		
  		
  		document.getElementById('preciogas_recibo').style.border="2px solid red";


  	}else{
  	 document.getElementById('preciogas_recibo').value=listapgr['preciogas'];
  	};
  	

  }else{
  	alert("Error AJAX");
  }

}


function calcularLitros(){
	/*Monto entre el precio de la gasolina*/
	mocl=document.getElementById('monto_recibo').value;
    pgcl=document.getElementById('preciogas_recibo').value;
	lt=(mocl)/(pgcl);
	lt1=lt.toFixed(2);
	document.getElementById('litros_recibo').value=lt1;
calcularRecorridoaprox();
}

function calcularRecorridoaprox(){/*
	/*litros por rendiminento por litro*/
	ltscra=document.getElementById('litros_recibo').value;
	rplcra=document.getElementById('rpl_recibo').value;
	ra=(ltscra)*(rplcra);
	ra1=ra.toFixed(2);
	document.getElementById('recorridoaprox_recibo').value=ra1;
}


/*Hacer consiltas modificacione etc...*/
function consultarReporte(){
	valfrc=document.getElementById('folio_rep_cons').value;
	datos_envcr="folio_reporte="+valfrc;
solicitudcrep=crearObjeto();
$('#timer').fadeIn(300);
solicitudcrep.open("POST", "./php/procConsReporte.php", true);
solicitudcrep.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudcrep.setRequestHeader("Content-lenght", datos_envcr.length);
solicitudcrep.setRequestHeader("Connection", "close");
solicitudcrep.addEventListener("load", respuesta_creporte, false);
solicitudcrep.send(datos_envcr);
	$('#timer').fadeOut(300);
	
	 
}

function respuesta_creporte(){
	if(solicitudcrep.readyState=4)
  {

  	listacrep = JSON.parse(solicitudcrep.responseText);
  	respuesta=listacrep['informe'];
  	NewBox.alert(respuesta);
  	document.getElementById('resultado_consulta_reporte-dentro').innerHTML=listacrep['resultado_cons_rep'];
  	if (respuesta=="Reporte Encontrado") {
  	document.getElementById('opciones_insertar').style.display="block";
  	}else{ 
  		document.getElementById('opciones_insertar').style.display="none";
  	};

  }else{
  	alert("Error AJAX");
  }
}

/*consultar un recibo*/
function consultarRecibo(){
aniorc=document.getElementById('anio_consulta').value;
		foliorc=document.getElementById('folio_consulta').value;

	datos_envcrecibo="anio_recibo="+aniorc+"&folio_recibo="+foliorc;
solicitudcrec=crearObjeto();
$('#timer').fadeIn(300);
solicitudcrec.open("POST", "./php/procConsRecibo.php", true);
solicitudcrec.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudcrec.setRequestHeader("Content-lenght", datos_envcrecibo.length);
solicitudcrec.setRequestHeader("Connection", "close");
solicitudcrec.addEventListener("load", respuesta_crecibo, false);
solicitudcrec.send(datos_envcrecibo);
	$('#timer').fadeOut(300);
	
}

function respuesta_crecibo(){
	if(solicitudcrec.readyState=4)
  {

  	listacrec = JSON.parse(solicitudcrec.responseText);
  	respuesta=listacrec['informe'];
  	NewBox.alert(respuesta);
  	if (listacrec['si_no']==1) {

/*document.getElementById("folio_recibo").style.display="block";
    document.getElementById("fecha_recibo").style.display="block";
  document.getElementById("area_recibo").style.display="block";
  document.getElementById("vehiculo_recibo").style.display="block";
  document.getElementById("noeco_recibo").style.display="block";
  document.getElementById("cilindraje_recibo").style.display="block";
  document.getElementById("ofcom_recibo").style.display="block";
  document.getElementById("comisionadoa_recibo").style.display="block";
  document.getElementById("recorridoaprox_recibo").style.display="block";
  document.getElementById("monto_recibo").style.display="block";
  document.getElementById("montoletra_recibo").style.display="block";
  document.getElementById("litros_recibo").style.display="block";
  document.getElementById("firma1_recibo").style.display="block";
  document.getElementById("firma2_recibo").style.display="block";
  document.getElementById("firma3_recibo").style.display="block";*/
  document.getElementById("recibo_dentro").style.display="block";

    document.getElementById("folio_recibo").value=listacrec['folioRecibo'];
    document.getElementById("fecha_recibo").value=listacrec['fechaDia']+" de "+listacrec['fechaMes']+" del "+listacrec['fechaAnio']; 
  document.getElementById("area_recibo").value=listacrec['AreaSolicitante'];
  /*document.getElementById("vehiculo_recibo").value=listacrec[''];*/
  document.getElementById("noeco_recibo").value=listacrec['noEcoUT'];
  /*document.getElementById("cilindraje_recibo").value=listacrec[''];*/
  document.getElementById("ofcom_recibo").value=listacrec['noOficioComision'];
  document.getElementById("comisionadoa_recibo").value=listacrec['destino'];
  document.getElementById("recorridoaprox_recibo").value=listacrec['recorridoAprox'];
  document.getElementById("monto_recibo").value=listacrec['montoNumero'];
  document.getElementById("montoletra_recibo").value=listacrec['montoLetra'];
  document.getElementById("litros_recibo").value=listacrec['litros'];
  document.getElementById("firma1_recibo").value=listacrec['nombreRecibi'];
  document.getElementById("firma2_recibo").value=listacrec['nombreVoBo'];
  document.getElementById("firma3_recibo").value=listacrec['nombreAutorizo'];

  	document.getElementById("opciones_insertar1").style.display="block";
  	document.getElementById('text_av').style.display="none";
  verificar_noeco();
}else if (listacrec['si_no']==0) {
document.getElementById("folio_recibo").value="No Encontrado";
    document.getElementById("fecha_recibo").value="No Encontrado"; 
  document.getElementById("area_recibo").value="No Encontrado";
  document.getElementById("vehiculo_recibo").value="No Encontrado";
  document.getElementById("noeco_recibo").value="No Encontrado";
  document.getElementById("cilindraje_recibo").value="No Encontrado";
  document.getElementById("ofcom_recibo").value="No Encontrado";
  document.getElementById("comisionadoa_recibo").value="No Encontrado";
  document.getElementById("recorridoaprox_recibo").value="No Encontrado";
  document.getElementById("monto_recibo").value="No Encontrado";
  document.getElementById("montoletra_recibo").value="No Encontrado";
  document.getElementById("litros_recibo").value="No Encontrado";
  document.getElementById("firma1_recibo").value="No Encontrado";
  document.getElementById("firma2_recibo").value="No Encontrado";
  document.getElementById("firma3_recibo").value="No Encontrado";

/*document.getElementById("folio_recibo").style.display="none";
    document.getElementById("fecha_recibo").style.display="none";
  document.getElementById("area_recibo").style.display="none";
  document.getElementById("vehiculo_recibo").style.display="none";
  document.getElementById("noeco_recibo").style.display="none";
  document.getElementById("cilindraje_recibo").style.display="none";
  document.getElementById("ofcom_recibo").style.display="none";
  document.getElementById("comisionadoa_recibo").style.display="none";
  document.getElementById("recorridoaprox_recibo").style.display="none";
  document.getElementById("monto_recibo").style.display="none";
  document.getElementById("montoletra_recibo").style.display="none";
  document.getElementById("litros_recibo").style.display="none";
  document.getElementById("firma1_recibo").style.display="none";
  document.getElementById("firma2_recibo").style.display="none";
  document.getElementById("firma3_recibo").style.display="none";*/
document.getElementById("recibo_dentro").style.display="none";


  document.getElementById("opciones_insertar1").style.display="none";
    	document.getElementById('text_av').innerHTML="<span id='centro_elimina'>"+respuesta+'</span>';
    	document.getElementById('text_av').style.display="block";
};
  }else{
  	alert("Error AJAX");
  }
}


/*consultar un vale*/
function consultarVale(){
aniovc=document.getElementById('anio_consulta_vale').value;
		numvc=document.getElementById('novale_cons').value;

	datos_envcvale="anio_vale="+aniovc+"&num_vale="+numvc;
solicitudcv=crearObjeto();
$('#timer').fadeIn(300);
solicitudcv.open("POST", "./php/procConsVale.php", true);
solicitudcv.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudcv.setRequestHeader("Content-lenght", datos_envcvale.length);
solicitudcv.setRequestHeader("Connection", "close");
solicitudcv.addEventListener("load", respuesta_cvale, false);
solicitudcv.send(datos_envcvale);
	$('#timer').fadeOut(300);
	
}

function respuesta_cvale(){
	if(solicitudcv.readyState=4)
  {

  	listacvale = JSON.parse(solicitudcv.responseText);
  	respuesta=listacvale['informe'];
  	NewBox.alert(respuesta);
  	document.getElementById('resultado_consulta_vale-dentro').innerHTML=listacvale['mostrar_vale_datosc'];
  	if (listacvale['si_no']==1) {
  		document.getElementById("opciones_insertar2").style.display="block";
  	}else if (listacvale['si_no']==0) {
document.getElementById("opciones_insertar2").style.display="none";
  	};
  	
  	


  }else{
  	alert("Error AJAX");
  }
}


/*consultar un vehiculo*/
function consultarVehiculo(){
noecovc=document.getElementById('novehiculo_cons').value;

	datos_envcvehiculo="noecovc="+noecovc;
solicitudcvehic=crearObjeto();
$('#timer').fadeIn(300);
solicitudcvehic.open("POST", "./php/procConsVehiculo.php", true);
solicitudcvehic.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudcvehic.setRequestHeader("Content-lenght", datos_envcvehiculo.length);
solicitudcvehic.setRequestHeader("Connection", "close");
solicitudcvehic.addEventListener("load", respuesta_cvehiculo, false);
solicitudcvehic.send(datos_envcvehiculo);
	$('#timer').fadeOut(300);
	
}

function respuesta_cvehiculo(){
	if(solicitudcvehic.readyState=4)
  {

  	listacvehiculo = JSON.parse(solicitudcvehic.responseText);
  	respuesta=listacvehiculo['informe'];
  	NewBox.alert(respuesta);
  	if (listacvehiculo['si_no']==1) {
  	document.getElementById('resultado_consulta_vehiculo-dentro').innerHTML=listacvehiculo['mostrar_vehiculo_datosc'];
  	document.getElementById("opciones_insertar3").style.display="block";
  	}else{
  	document.getElementById('resultado_consulta_vehiculo-dentro').innerHTML=respuesta;
  	document.getElementById("opciones_insertar3").style.display="none";
  	};


  }else{
  	alert("Error AJAX");
  }
}
/*eliminar un reporte*/
function eliminaReporte(){


NewBox.confirm("Esta seguro?<br>Se Eliminará el Reporte de la Base de Datos<br> y ya No se Podrá recuperar", {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
folio_repeliminar=document.getElementById('folio_repc').innerHTML;
folio_repeliminar="folio_repeliminar="+folio_repeliminar;
solicitudelimrep=crearObjeto();
$('#timer').fadeIn(300);
solicitudelimrep.open("POST", "./php/procElimReporte.php", true);
solicitudelimrep.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudelimrep.setRequestHeader("Content-lenght", folio_repeliminar.length);
solicitudelimrep.setRequestHeader("Connection", "close");
solicitudelimrep.addEventListener("load", respuestafoliorepeliminar, false);
solicitudelimrep.send(folio_repeliminar);
	$('#timer').fadeOut(300);

            }else{

NewBox.alert("Eliminacion Cancelada...");

}
          }
        });

}

function respuestafoliorepeliminar(){
if(solicitudelimrep.readyState=4)
  {

  	listaelimrep = JSON.parse(solicitudelimrep.responseText);
  	respuesta=listaelimrep['informe'];
  	tabla=listaelimrep['tabla'];
  	NewBox.alert(respuesta);
  	if (listaelimrep['si_no']==1) {
  	document.getElementById('resultado_consulta_reporte-dentro').innerHTML=respuesta;
  	document.getElementById('opciones_insertar').style.display="none";
  	document.getElementById('mostrar').innerHTML=tabla;
  	}else{
  	
  	};


  }else{
  	alert("Error AJAX");
  }
}

/*eliminar un recibo*/

function eliminaRecibo(){

NewBox.confirm("Esta seguro?<br>Se Eliminará el Recibo y Automaticamente <strong>EL VALE</strong> Correspondiente de la Base de Datos<br> Ya No se Podrán recuperar", {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
folio_receliminar=document.getElementById('folio_recibo').value;
eliminaValesec(folio_receliminar);
folio_receliminar="folio_receliminar="+folio_receliminar;
solicitudelimrec=crearObjeto();
$('#timer').fadeIn(300);
solicitudelimrec.open("POST", "./php/procElimRecibo.php", true);
solicitudelimrec.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudelimrec.setRequestHeader("Content-lenght", folio_receliminar.length);
solicitudelimrec.setRequestHeader("Connection", "close");
solicitudelimrec.addEventListener("load", respuestafolioreceliminar, false);
solicitudelimrec.send(folio_receliminar);
	$('#timer').fadeOut(300);

            }else{

NewBox.alert("Eliminacion Cancelada...");

}
          }
        });

}

function respuestafolioreceliminar(){
if(solicitudelimrec.readyState=4)
  {
  	listaelimrec = JSON.parse(solicitudelimrec.responseText);
  	respuesta=listaelimrec['informe'];
  	tabla=listaelimrec['tabla'];
  	NewBox.alert(respuesta);
  	if (listaelimrec['si_no']==1) {
  	document.getElementById('mostrar1').innerHTML=tabla;
  	document.getElementById('opciones_insertar1').style.display="none";

  	document.getElementById("text_av").style.display="block";
  	document.getElementById("recibo_dentro").style.display="none";
  	document.getElementById('text_av').innerHTML="<span id='centro_elimina'>"+respuesta+'</span>';

  	}else{
  	
  	};


  }else{
  	alert("Error AJAX");
  }
}

function eliminaValesec(folio_valeliminarsec){

folio_valeliminarsec="folio_valeliminar="+folio_valeliminarsec;
solicitudelimvalsec=crearObjeto();
$('#timer').fadeIn(300);
solicitudelimvalsec.open("POST", "./php/procElimVale.php", true);
solicitudelimvalsec.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudelimvalsec.setRequestHeader("Content-lenght", folio_valeliminarsec.length);
solicitudelimvalsec.setRequestHeader("Connection", "close");
solicitudelimvalsec.addEventListener("load", respuestafoliovaleliminasec, false);
solicitudelimvalsec.send(folio_valeliminarsec);
	$('#timer').fadeOut(300);
          
}

function respuestafoliovaleliminasec(){
if(solicitudelimvalsec.readyState=4)
  {

  	listaelimvalsec = JSON.parse(solicitudelimvalsec.responseText);
  	respuesta=listaelimvalsec['informe'];

  	NewBox.alert(respuesta);
  	
  }else{
  	alert("Error AJAX");
  }
}





/*eliminar un vale*/

function eliminaVale(){

NewBox.confirm("Esta seguro?<br>Se Eliminará el Vale y Automaticamente <strong>EL RECIBO</strong> Correspondiente de la Base de Datos<br> Ya No se Podrán recuperar", {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
folio_valeliminar=document.getElementById('no_valec').innerHTML;
eliminaRecibosec(folio_valeliminar);
folio_valeliminar="folio_valeliminar="+folio_valeliminar;
solicitudelimval=crearObjeto();
$('#timer').fadeIn(300);
solicitudelimval.open("POST", "./php/procElimVale.php", true);
solicitudelimval.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudelimval.setRequestHeader("Content-lenght", folio_valeliminar.length);
solicitudelimval.setRequestHeader("Connection", "close");
solicitudelimval.addEventListener("load", respuestafoliovaleliminar, false);
solicitudelimval.send(folio_valeliminar);
	$('#timer').fadeOut(300);

            }else{

NewBox.alert("Eliminacion Cancelada...");

}
          }
        });

}

function respuestafoliovaleliminar(){
if(solicitudelimval.readyState=4)
  {

  	listaelimrec = JSON.parse(solicitudelimval.responseText);
  	respuesta=listaelimrec['informe'];
  	tabla=listaelimrec['tabla'];
  	NewBox.alert(respuesta);
  	if (listaelimrec['si_no']==1) {
 	document.getElementById('resultado_consulta_vale-dentro').innerHTML=respuesta;
  	document.getElementById('opciones_insertar2').style.display="none";

  	document.getElementById('mostrar2').innerHTML=tabla;
  
  	}else{
  	
  	};


  }else{
  	alert("Error AJAX");
  }
}


function eliminaRecibosec(folio_receliminarsec){

folio_receliminarsec="folio_receliminar="+folio_receliminarsec;
solicitudelimrecsec=crearObjeto();
$('#timer').fadeIn(300);
solicitudelimrecsec.open("POST", "./php/procElimRecibo.php", true);
solicitudelimrecsec.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudelimrecsec.setRequestHeader("Content-lenght", folio_receliminarsec.length);
solicitudelimrecsec.setRequestHeader("Connection", "close");
solicitudelimrecsec.addEventListener("load", respuestafolioreceliminarsec, false);
solicitudelimrecsec.send(folio_receliminarsec);
	$('#timer').fadeOut(300);

}

function respuestafolioreceliminarsec(){
if(solicitudelimrecsec.readyState=4)
  {

  	listaelimrecsec = JSON.parse(solicitudelimrecsec.responseText);
  	respuestar=listaelimrecsec['informe'];
  	NewBox.alert(respuestar);


  

  }else{
  	alert("Error AJAX");
  }
}



/*eliminar un vehiculo*/

function eliminaVehiculo(){

NewBox.confirm("Esta seguro?<br>Se Eliminará el Vehiculo de la Base de Datos<br> Ya No Podrá ser Recuperado", {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
noeco_veeliminar=document.getElementById('noeco_vcons').value;
noeco_veeliminar="noeco_veeliminar="+noeco_veeliminar;
solicitudelimveh=crearObjeto();
$('#timer').fadeIn(300);
solicitudelimveh.open("POST", "./php/procElimUnidadDeTransporte.php", true);
solicitudelimveh.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudelimveh.setRequestHeader("Content-lenght", noeco_veeliminar.length);
solicitudelimveh.setRequestHeader("Connection", "close");
solicitudelimveh.addEventListener("load", respuestafoliovehiculoliminar, false);
solicitudelimveh.send(noeco_veeliminar);
	$('#timer').fadeOut(300);

            }else{

NewBox.alert("Eliminacion Cancelada...");

}
          }
        });

}

function respuestafoliovehiculoliminar(){
if(solicitudelimveh.readyState=4)
  {

  	listaelimveh = JSON.parse(solicitudelimveh.responseText);
  	respuesta=listaelimveh['informe'];
  	tabla=listaelimveh['tabla'];
  	NewBox.alert(respuesta);
  	if (listaelimveh['si_no']==1) {
 	document.getElementById('resultado_consulta_vehiculo-dentro').innerHTML=respuesta;
  	document.getElementById('opciones_insertar3').style.display="none";

  	document.getElementById('mostrar3').innerHTML=tabla;
  
  	}else{
  	
  	};


  }else{
  	alert("Error AJAX");
  }
}


function cambiarContrasenia(pnva1){
NewBox.confirm("Se Cambiará la Contraseña para Ingresar al Sistema...", {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {

contracam="contracam="+pnva1;
solicitudcontracam=crearObjeto();
$('#timer').fadeIn(300);
solicitudcontracam.open("POST", "./php/procCambiarPsswC.php", true);
solicitudcontracam.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudcontracam.setRequestHeader("Content-lenght", contracam.length);
solicitudcontracam.setRequestHeader("Connection", "close");
solicitudcontracam.addEventListener("load", respuestacmbrpssw, false);
solicitudcontracam.send(contracam);
	$('#timer').fadeOut(300);

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });
}

function respuestacmbrpssw(){
	listarmcc=JSON.parse(solicitudcontracam.responseText);
	NewBox.alert(listarmcc['informe']);
if (listarmcc['si_no']==1) {
	document.getElementById('password_actual_cmbr').value="";
	document.getElementById('password_new_cmbr').value="";
    document.getElementById('password_new1_cmbr').value="";
    };
}

/*modificaciones de los vehiculos*/

function modifica_DV(idv, no, cmod){
    idvn=idv.value;
	valmv=cmod.value;

	/*primera modificacion*/
if (no==1) {
	NewBox.prompt("Ingresa el Nuevo valor para El No de Inventario del Vehiculo<br> El Valor Actual Es: "+valmv,valmv,  {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
valmnvo=returnvalue;
noinvcmbr="idvehic="+idvn+"&noinvcmbr="+valmnvo;
solicitudnoinvcmbr=crearObjeto();
$('#timer').fadeIn(300);
solicitudnoinvcmbr.open("POST", "./php/procMod1Veh.php", true);
solicitudnoinvcmbr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudnoinvcmbr.setRequestHeader("Content-lenght", noinvcmbr.length);
solicitudnoinvcmbr.setRequestHeader("Connection", "close");
solicitudnoinvcmbr.addEventListener("load", respuestanoecocmbr, false);
solicitudnoinvcmbr.send(noinvcmbr);
	$('#timer').fadeOut(300);

function respuestanoecocmbr(){
	listanoinvcmbr=JSON.parse(solicitudnoinvcmbr.responseText);
	respmod1=listanoinvcmbr['informe'];
	NewBox.alert(respmod1);
	if (listanoinvcmbr['si_no']==1) {
		valmv=cmod.value=returnvalue;
	};
	
}

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });
}else if (no==2) {
	NewBox.prompt("Ingresa el Nuevo valor para LOCALIDAD del Vehiculo<br> El Valor Actual Es: "+valmv,valmv,  {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
valmnvo=returnvalue;
noinvcmbr2="idvehic="+idvn+"&mod2="+valmnvo;
solicitudnoinvcmbr2=crearObjeto();
$('#timer').fadeIn(300);
solicitudnoinvcmbr2.open("POST", "./php/procMod2Veh.php", true);
solicitudnoinvcmbr2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudnoinvcmbr2.setRequestHeader("Content-lenght", noinvcmbr2.length);
solicitudnoinvcmbr2.setRequestHeader("Connection", "close");
solicitudnoinvcmbr2.addEventListener("load", respuestanoecocmbr2, false);
solicitudnoinvcmbr2.send(noinvcmbr2);
	$('#timer').fadeOut(300);

function respuestanoecocmbr2(){
	listanoinvcmbr2=JSON.parse(solicitudnoinvcmbr2.responseText);
	respmod2=listanoinvcmbr2['informe'];
	NewBox.alert(respmod2);
	if (listanoinvcmbr2['si_no']==1) {
		valmv=cmod.value=returnvalue;
	};
	
}

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });

}else if (no==3) {
	NewBox.prompt("Ingresa el Nuevo valor para El MUNICIPIO del Vehiculo<br> El Valor Actual Es: "+valmv,valmv,  {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
valmnvo=returnvalue;
noinvcmbr3="idvehic="+idvn+"&mod3="+valmnvo;
solicitudnoinvcmbr3=crearObjeto();
$('#timer').fadeIn(300);
solicitudnoinvcmbr3.open("POST", "./php/procMod3Veh.php", true);
solicitudnoinvcmbr3.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudnoinvcmbr3.setRequestHeader("Content-lenght", noinvcmbr3.length);
solicitudnoinvcmbr3.setRequestHeader("Connection", "close");
solicitudnoinvcmbr3.addEventListener("load", respuestanoecocmbr3, false);
solicitudnoinvcmbr3.send(noinvcmbr3);
	$('#timer').fadeOut(300);

function respuestanoecocmbr3(){
	listanoinvcmbr3=JSON.parse(solicitudnoinvcmbr3.responseText);
	respmod3=listanoinvcmbr3['informe'];
	NewBox.alert(respmod3);
	if (listanoinvcmbr3['si_no']==1) {
		valmv=cmod.value=returnvalue;
	};
	
}

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });

}else if (no==4) {
	NewBox.prompt("Ingresa el Nuevo valor para MARCA del Vehiculo<br> El Valor Actual Es: "+valmv,valmv,  {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
valmnvo=returnvalue;
noinvcmbr4="idvehic="+idvn+"&mod4="+valmnvo;
solicitudnoinvcmbr4=crearObjeto();
$('#timer').fadeIn(300);
solicitudnoinvcmbr4.open("POST", "./php/procMod4Veh.php", true);
solicitudnoinvcmbr4.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudnoinvcmbr4.setRequestHeader("Content-lenght", noinvcmbr4.length);
solicitudnoinvcmbr4.setRequestHeader("Connection", "close");
solicitudnoinvcmbr4.addEventListener("load", respuestanoecocmbr4, false);
solicitudnoinvcmbr4.send(noinvcmbr4);
	$('#timer').fadeOut(300);

function respuestanoecocmbr4(){
	listanoinvcmbr4=JSON.parse(solicitudnoinvcmbr4.responseText);
	respmod4=listanoinvcmbr4['informe'];
	NewBox.alert(respmod4);
	if (listanoinvcmbr4['si_no']==1) {
		valmv=cmod.value=returnvalue;
	};
	
}

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });

}else if (no==5) {
	NewBox.prompt("Ingresa el Nuevo valor para TIPO del Vehiculo<br> El Valor Actual Es: "+valmv,valmv,  {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
valmnvo=returnvalue;
noinvcmbr5="idvehic="+idvn+"&mod5="+valmnvo;
solicitudnoinvcmbr5=crearObjeto();
$('#timer').fadeIn(300);
solicitudnoinvcmbr5.open("POST", "./php/procMod5Veh.php", true);
solicitudnoinvcmbr5.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudnoinvcmbr5.setRequestHeader("Content-lenght", noinvcmbr5.length);
solicitudnoinvcmbr5.setRequestHeader("Connection", "close");
solicitudnoinvcmbr5.addEventListener("load", respuestanoecocmbr5, false);
solicitudnoinvcmbr5.send(noinvcmbr5);
	$('#timer').fadeOut(300);

function respuestanoecocmbr5(){
	listanoinvcmbr5=JSON.parse(solicitudnoinvcmbr5.responseText);
	respmod5=listanoinvcmbr5['informe'];
	NewBox.alert(respmod5);
	if (listanoinvcmbr5['si_no']==1) {
		valmv=cmod.value=returnvalue;
	};
	
}

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });

}else if (no==6) {
	NewBox.prompt("Ingresa el Nuevo valor para MODELO del Vehiculo<br> El Valor Actual Es: "+valmv+"<br>Recuerda que Solo Aceptará Números ",valmv,  {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
valmnvo=returnvalue;
noinvcmbr6="idvehic="+idvn+"&mod6="+valmnvo;
solicitudnoinvcmbr6=crearObjeto();
$('#timer').fadeIn(300);
solicitudnoinvcmbr6.open("POST", "./php/procMod6Veh.php", true);
solicitudnoinvcmbr6.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudnoinvcmbr6.setRequestHeader("Content-lenght", noinvcmbr6.length);
solicitudnoinvcmbr6.setRequestHeader("Connection", "close");
solicitudnoinvcmbr6.addEventListener("load", respuestanoecocmbr6, false);
solicitudnoinvcmbr6.send(noinvcmbr6);
	$('#timer').fadeOut(300);

function respuestanoecocmbr6(){
	listanoinvcmbr6=JSON.parse(solicitudnoinvcmbr6.responseText);
	respmod6=listanoinvcmbr6['informe'];
	NewBox.alert(respmod6);
	if (listanoinvcmbr6['si_no']==1) {
		valmv=cmod.value=returnvalue;
	};
	
}

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });

}else if (no==7) {
	NewBox.prompt("Ingresa el Nuevo valor para PLACAS del Vehiculo<br> El Valor Actual Es: "+valmv,valmv,  {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
valmnvo=returnvalue;
noinvcmbr7="idvehic="+idvn+"&mod7="+valmnvo;
solicitudnoinvcmbr7=crearObjeto();
$('#timer').fadeIn(300);
solicitudnoinvcmbr7.open("POST", "./php/procMod7Veh.php", true);
solicitudnoinvcmbr7.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudnoinvcmbr7.setRequestHeader("Content-lenght", noinvcmbr7.length);
solicitudnoinvcmbr7.setRequestHeader("Connection", "close");
solicitudnoinvcmbr7.addEventListener("load", respuestanoecocmbr7, false);
solicitudnoinvcmbr7.send(noinvcmbr7);
	$('#timer').fadeOut(300);

function respuestanoecocmbr7(){
	listanoinvcmbr7=JSON.parse(solicitudnoinvcmbr7.responseText);
	respmod7=listanoinvcmbr7['informe'];
	NewBox.alert(respmod7);
	if (listanoinvcmbr7['si_no']==1) {
		valmv=cmod.value=returnvalue;
	};
	
}

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });

}else if (no==8) {

            
}else if (no==9) {
		NewBox.prompt("Ingresa el Nuevo valor para No. de Id. Vehicular del Vehiculo<br> El Valor Actual Es: "+valmv,valmv,  {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
valmnvo=returnvalue;
noinvcmbr9="idvehic="+idvn+"&mod9="+valmnvo;
solicitudnoinvcmbr9=crearObjeto();
$('#timer').fadeIn(300);
solicitudnoinvcmbr9.open("POST", "./php/procMod9Veh.php", true);
solicitudnoinvcmbr9.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudnoinvcmbr9.setRequestHeader("Content-lenght", noinvcmbr9.length);
solicitudnoinvcmbr9.setRequestHeader("Connection", "close");
solicitudnoinvcmbr9.addEventListener("load", respuestanoecocmbr9, false);
solicitudnoinvcmbr9.send(noinvcmbr9);
	$('#timer').fadeOut(300);

function respuestanoecocmbr9(){
	listanoinvcmbr9=JSON.parse(solicitudnoinvcmbr9.responseText);
	respmod9=listanoinvcmbr9['informe'];
	NewBox.alert(respmod9);
	if (listanoinvcmbr9['si_no']==1) {
		valmv=cmod.value=returnvalue;
	};
	
}

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });


}else if (no==10) {
	NewBox.prompt("Ingresa el Nuevo valor para No. de Motor del Vehiculo<br> El Valor Actual Es: "+valmv,valmv,  {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
valmnvo=returnvalue;
noinvcmbr10="idvehic="+idvn+"&mod10="+valmnvo;
solicitudnoinvcmbr10=crearObjeto();
$('#timer').fadeIn(300);
solicitudnoinvcmbr10.open("POST", "./php/procMod10Veh.php", true);
solicitudnoinvcmbr10.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudnoinvcmbr10.setRequestHeader("Content-lenght", noinvcmbr10.length);
solicitudnoinvcmbr10.setRequestHeader("Connection", "close");
solicitudnoinvcmbr10.addEventListener("load", respuestanoecocmbr10, false);
solicitudnoinvcmbr10.send(noinvcmbr10);
	$('#timer').fadeOut(300);

function respuestanoecocmbr10(){
	listanoinvcmbr10=JSON.parse(solicitudnoinvcmbr10.responseText);
	respmod10=listanoinvcmbr10['informe'];
	NewBox.alert(respmod10);
	if (listanoinvcmbr10['si_no']==1) {
		valmv=cmod.value=returnvalue;
	};
	
}

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });
}else if (no==11) {
	/*numero de cilintros no se modifica*/
}else if (no==12) {
	/*rendimiento no se modifica*/
}else if (no==13) {
	NewBox.prompt("Ingresa el Nuevo valor para ASEGURADORA del Vehiculo<br> El Valor Actual Es: "+valmv,valmv,  {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
valmnvo=returnvalue;
noinvcmbr13="idvehic="+idvn+"&mod13="+valmnvo;
solicitudnoinvcmbr13=crearObjeto();
$('#timer').fadeIn(300);
solicitudnoinvcmbr13.open("POST", "./php/procMod13Veh.php", true);
solicitudnoinvcmbr13.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudnoinvcmbr13.setRequestHeader("Content-lenght", noinvcmbr13.length);
solicitudnoinvcmbr13.setRequestHeader("Connection", "close");
solicitudnoinvcmbr13.addEventListener("load", respuestanoecocmbr13, false);
solicitudnoinvcmbr13.send(noinvcmbr13);
	$('#timer').fadeOut(300);

function respuestanoecocmbr13(){
	listanoinvcmbr13=JSON.parse(solicitudnoinvcmbr13.responseText);
	respmod13=listanoinvcmbr13['informe'];
	NewBox.alert(respmod13);
	if (listanoinvcmbr13['si_no']==1) {
		valmv=cmod.value=returnvalue;
	};
	
}

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });
}else if (no==14) {
	NewBox.prompt("Ingresa el Nuevo valor para POLIZA del Vehiculo<br> El Valor Actual Es: "+valmv,valmv,  {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
valmnvo=returnvalue;
noinvcmbr14="idvehic="+idvn+"&mod14="+valmnvo;
solicitudnoinvcmbr14=crearObjeto();
$('#timer').fadeIn(300);
solicitudnoinvcmbr14.open("POST", "./php/procMod14Veh.php", true);
solicitudnoinvcmbr14.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudnoinvcmbr14.setRequestHeader("Content-lenght", noinvcmbr14.length);
solicitudnoinvcmbr14.setRequestHeader("Connection", "close");
solicitudnoinvcmbr14.addEventListener("load", respuestanoecocmbr14, false);
solicitudnoinvcmbr14.send(noinvcmbr14);
	$('#timer').fadeOut(300);

function respuestanoecocmbr14(){
	listanoinvcmbr14=JSON.parse(solicitudnoinvcmbr14.responseText);
	respmod14=listanoinvcmbr14['informe'];
	NewBox.alert(respmod14);
	if (listanoinvcmbr14['si_no']==1) {
		valmv=cmod.value=returnvalue;
	};
	
}

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });

}else if (no==15) {
	NewBox.prompt("Ingresa el Nuevo valor para EXPED del seguro del Vehiculo<br> El Valor Actual Es: "+valmv+"<br>Con Formato <strong>AAAA-MM-DD</strong><br>De lo Contrario NO se Modificará Correctamente",valmv,  {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
valmnvo=returnvalue;
noinvcmbr15="idvehic="+idvn+"&mod15="+valmnvo;
solicitudnoinvcmbr15=crearObjeto();
$('#timer').fadeIn(300);
solicitudnoinvcmbr15.open("POST", "./php/procMod15Veh.php", true);
solicitudnoinvcmbr15.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudnoinvcmbr15.setRequestHeader("Content-lenght", noinvcmbr15.length);
solicitudnoinvcmbr15.setRequestHeader("Connection", "close");
solicitudnoinvcmbr15.addEventListener("load", respuestanoecocmbr15, false);
solicitudnoinvcmbr15.send(noinvcmbr15);
	$('#timer').fadeOut(300);

function respuestanoecocmbr15(){
	listanoinvcmbr15=JSON.parse(solicitudnoinvcmbr15.responseText);
	respmod15=listanoinvcmbr15['informe'];
	NewBox.alert(respmod15);
	if (listanoinvcmbr15['si_no']==1) {
		valmv=cmod.value=returnvalue;
	};
	
}

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });

}else if (no==16) {
	NewBox.prompt("Ingresa el Nuevo valor para VIGENCIA del seguro del Vehiculo<br> El Valor Actual Es: "+valmv+"<br>Con Formato <strong>AAAA-MM-DD</strong><br>De lo Contrario NO se Modificará Correctamente",valmv,  {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
valmnvo=returnvalue;
noinvcmbr16="idvehic="+idvn+"&mod16="+valmnvo;
solicitudnoinvcmbr16=crearObjeto();
$('#timer').fadeIn(300);
solicitudnoinvcmbr16.open("POST", "./php/procMod16Veh.php", true);
solicitudnoinvcmbr16.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudnoinvcmbr16.setRequestHeader("Content-lenght", noinvcmbr16.length);
solicitudnoinvcmbr16.setRequestHeader("Connection", "close");
solicitudnoinvcmbr16.addEventListener("load", respuestanoecocmbr16, false);
solicitudnoinvcmbr16.send(noinvcmbr16);
	$('#timer').fadeOut(300);

function respuestanoecocmbr16(){
	listanoinvcmbr16=JSON.parse(solicitudnoinvcmbr16.responseText);
	respmod16=listanoinvcmbr16['informe'];
	NewBox.alert(respmod16);
	if (listanoinvcmbr16['si_no']==1) {
		valmv=cmod.value=returnvalue;
	};
	
}

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });

}else if (no==17) {
	NewBox.prompt("Ingresa el Nuevo valor para VERIFICACIÓN del Vehiculo<br> El Valor Actual Es: "+valmv,valmv,  {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
valmnvo=returnvalue;
noinvcmbr17="idvehic="+idvn+"&mod17="+valmnvo;
solicitudnoinvcmbr17=crearObjeto();
$('#timer').fadeIn(300);
solicitudnoinvcmbr17.open("POST", "./php/procMod17Veh.php", true);
solicitudnoinvcmbr17.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudnoinvcmbr17.setRequestHeader("Content-lenght", noinvcmbr17.length);
solicitudnoinvcmbr17.setRequestHeader("Connection", "close");
solicitudnoinvcmbr17.addEventListener("load", respuestanoecocmbr17, false);
solicitudnoinvcmbr17.send(noinvcmbr17);
	$('#timer').fadeOut(300);

function respuestanoecocmbr17(){
	listanoinvcmbr17=JSON.parse(solicitudnoinvcmbr17.responseText);
	respmod17=listanoinvcmbr17['informe'];
	NewBox.alert(respmod17);
	if (listanoinvcmbr17['si_no']==1) {
		valmv=cmod.value=returnvalue;
	};
	
}

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });

}else if (no==18) {
	NewBox.prompt("Ingresa el Nuevo valor para No. Tipo de Servicio del Vehiculo<br> El Valor Actual Es: "+valmv+"<br>Recuerda que Solo Números",valmv,  {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
valmnvo=returnvalue;
noinvcmbr18="idvehic="+idvn+"&mod18="+valmnvo;
solicitudnoinvcmbr18=crearObjeto();
$('#timer').fadeIn(300);
solicitudnoinvcmbr18.open("POST", "./php/procMod18Veh.php", true);
solicitudnoinvcmbr18.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudnoinvcmbr18.setRequestHeader("Content-lenght", noinvcmbr18.length);
solicitudnoinvcmbr18.setRequestHeader("Connection", "close");
solicitudnoinvcmbr18.addEventListener("load", respuestanoecocmbr18, false);
solicitudnoinvcmbr18.send(noinvcmbr18);
	$('#timer').fadeOut(300);

function respuestanoecocmbr18(){
	listanoinvcmbr18=JSON.parse(solicitudnoinvcmbr18.responseText);
	respmod18=listanoinvcmbr18['informe'];
	NewBox.alert(respmod18);
	if (listanoinvcmbr18['si_no']==1) {
		valmv=cmod.value=returnvalue;
	};
	
}

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });
}else if (no==19) {
	NewBox.prompt("Ingresa el Nuevo valor para EDO. FISICO del Vehiculo<br> El Valor Actual Es: "+valmv,valmv,  {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
valmnvo=returnvalue;
noinvcmbr19="idvehic="+idvn+"&mod19="+valmnvo;
solicitudnoinvcmbr19=crearObjeto();
$('#timer').fadeIn(300);
solicitudnoinvcmbr19.open("POST", "./php/procMod19Veh.php", true);
solicitudnoinvcmbr19.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudnoinvcmbr19.setRequestHeader("Content-lenght", noinvcmbr19.length);
solicitudnoinvcmbr19.setRequestHeader("Connection", "close");
solicitudnoinvcmbr19.addEventListener("load", respuestanoecocmbr19, false);
solicitudnoinvcmbr19.send(noinvcmbr19);
	$('#timer').fadeOut(300);

function respuestanoecocmbr19(){
	listanoinvcmbr19=JSON.parse(solicitudnoinvcmbr19.responseText);
	respmod19=listanoinvcmbr19['informe'];
	NewBox.alert(respmod19);
	if (listanoinvcmbr19['si_no']==1) {
		valmv=cmod.value=returnvalue;
	};
	
}

            }else{

NewBox.alert("Modificación Cancelada...");

}
          }
        });

};

	/*
No se modifica porq sirve como referencia=No eco.:.
1=No Inventario:.
2=Localidad:.
3=Municipio:.
4=Marca:.
5=Tipo:.
6=Modelo:.
7=Placas:.
8=Kilometraje:.
9=No. de Id. Vehicular:.
10=No. de Motor:.
11=No. de Cilintros:.
12=Rendimiento P/Litro:.
13=Aseguradora:.
14=Poliza:.
15=Exped:.
16=Vigencia:.
17=Verificacion:.
18=No. Tipo de Servicio:.
19=Edo. Fisico:.
*/
	
}/*termina funcion*/

/*
function generaReporteVehiculo(){
noecogr=document.getElementById('novehiculo_rep').value;
	fechagr=document.getElementById('mes_rep').value;
	fecha_gr_array=fechagr.split("-");

	mes_fv=fecha_gr_array[1];
	if(mes_fv==01){
    mes_fv="ENERO";
	}else if (mes_fv==02) {
		mes_fv="FEBRERO";
	}else if(mes_fv==03){
mes_fv="MARZO";
	}else if(mes_fv==04){
mes_fv="ABRIL";
	}else if(mes_fv==05){
mes_fv="MAYO";
	}else if(mes_fv==06){
mes_fv="JUNIO";
	}else if(mes_fv==07){
mes_fv="JULIO";
	}else if(mes_fv==08){
mes_fv="AGOSTO";
	}else if(mes_fv==09){
mes_fv="SEPTIEMBRE";
	}else if(mes_fv==10){
mes_fv="OCTUBRE";
	}else if(mes_fv==11){
mes_fv="NOVIEMBRE";
	}else if(mes_fv==12){
mes_fv="DICIEMBRE";
	};
	anio_fv=fecha_gr_array[0];


    dgr="noecogr="+noecogr+"&anio_fv="+anio_fv+"&mes_fv="+mes_fv;
solicituddgr=crearObjeto();
$('#timer').fadeIn(300);
solicituddgr.open("POST", "./php/reportePDF.php", true);
solicituddgr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicituddgr.setRequestHeader("Content-lenght", dgr.length);
solicituddgr.setRequestHeader("Connection", "close");
solicituddgr.addEventListener("load", respdgr, false);
solicituddgr.send(dgr);
	$('#timer').fadeOut(300);
alert(dgr);

function respdgr(){
	window.open("./php/reportePDF.php");
}


}*/


function muestraRepim(){
noecogr=document.getElementById('novehiculo_rep').value;
	mes_fv=document.getElementById('mes_fv').value;
	anio_fv=document.getElementById('anio_fv').value;


dgr="noecogr="+noecogr+"&anio_fv="+anio_fv+"&mes_fv="+mes_fv;
	solicituddgr=crearObjeto();
$('#timer').fadeIn(300);
solicituddgr.open("POST", "./php/muestraRep.php", true);
solicituddgr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicituddgr.setRequestHeader("Content-lenght", dgr.length);
solicituddgr.setRequestHeader("Connection", "close");
solicituddgr.addEventListener("load", respdgr, false);
solicituddgr.send(dgr);
	$('#timer').fadeOut(300);

function respdgr(){

	listamrimp1=JSON.parse(solicituddgr.responseText);
	NewBox.alert(listamrimp1["informe"]);
	if (listamrimp1["si_no"]==1) {
		document.getElementById('muestra_repimp').innerHTML=listamrimp1["mostrarrep"];
		/*document.getElementById('novehiculo_rep').readOnly="true";
	document.getElementById('mes_fv').readOnly="true";
	document.getElementById('anio_fv').readOnly="true";*/
	document.getElementById('bloquea').style.display="block";
};

}
}

function desbloquea_rep(){
	document.getElementById('bloquea').style.display="none";
}

function opc_rein(){
document.getElementById('opcrein').style.display="block";
document.getElementById('bienv').style.display="none";
verificarTabla();
};


function reiniciaTabla(){

	var fechaa=new Date(); 
            var anioa=fechaa.getYear();
            if (anioa < 1000);
            anioa+=1900;
	aniont=anioa;
NewBox.confirm("Esta seguro?<br>Se Crearán Nuevas Tablas Para Recibos y Vales", {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
anio_tabla="anio_tabla="+aniont;
solicitudanio_tabla=crearObjeto();
$('#timer').fadeIn(300);
solicitudanio_tabla.open("POST", "./php/CreaTablasNuevas.php", true);
solicitudanio_tabla.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudanio_tabla.setRequestHeader("Content-lenght", anio_tabla.length);
solicitudanio_tabla.setRequestHeader("Connection", "close");
solicitudanio_tabla.addEventListener("load", respuestaanio_tabla, false);
solicitudanio_tabla.send(anio_tabla);
	$('#timer').fadeOut(300);

            }else{

NewBox.alert("Reinicio Cancelado...");


}
          }
        });
}

function respuestaanio_tabla(){
	listact=JSON.parse(solicitudanio_tabla.responseText);
	NewBox.alert(listact["informe"]);
}

function cambiaTabla(){

	seltab=document.getElementById('tablas').value;
	if (seltab!="") {

seltab="seltab="+seltab;
solicitudselectabla=crearObjeto();
$('#timer').fadeIn(300);
solicitudselectabla.open("POST", "./php/CambiaTabla.php", true);
solicitudselectabla.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudselectabla.setRequestHeader("Content-lenght", seltab.length);
solicitudselectabla.setRequestHeader("Connection", "close");
solicitudselectabla.addEventListener("load", respuestacambtabla, false);
solicitudselectabla.send(seltab);
	$('#timer').fadeOut(300);
}else{
	document.getElementById('tablas').style.border="2px solid red";
    document.getElementById('tablas').addEventListener("click", restablecer, false);;
} ;

}

function respuestacambtabla(){
	listavt1=JSON.parse(solicitudselectabla.responseText);
	/*alert(solicitudselectabla.responseText);*/
	verificarTabla();
		if (listavt1["si_no"]==1) {
		NewBox.alert("Se Cambiaron las Tablas Correctamente");
	}else NewBox.alert("NO Se Cambiaron las Tablas Correctamente");

}

function verificarTabla(){
val="val="+1;
solicitudvt=crearObjeto();
$('#timer').fadeIn(300);
solicitudvt.open("POST", "./php/verificarTabla.php", true);
solicitudvt.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudvt.setRequestHeader("Content-lenght", val.length);
solicitudvt.setRequestHeader("Connection", "close");
solicitudvt.addEventListener("load", respuestaverbtabla, false);
solicitudvt.send(val);
	$('#timer').fadeOut(300);
}

function respuestaverbtabla(){
	listavt=JSON.parse(solicitudvt.responseText);
document.getElementById('met').innerHTML='TABLAS SELECCIONADAS: '+listavt["informe"]+'ES';
	/*alert(solicitudvt.responseText);*/

}