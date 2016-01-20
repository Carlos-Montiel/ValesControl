
(function(a){
	a.fn.validCampos=function(b){
		a(this).on({
			keypress:function(a){
				var c=a.which,d=a.keyCode,
				e=String.fromCharCode(c).toLowerCase(),
				f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()
			}
		})
	}
})(jQuery);

function validarRecibo(){
	$('#timer').fadeIn(300);
	preciogas_recibo=document.getElementById("preciogas_recibo").value;
	destinode_recibo=document.getElementById("destinode_recibo").value;
    destinoa_recibo=document.getElementById("destinoa_recibo").value;
    nomcon_recibo=document.getElementById("nomcon_recibo").value;
	folio_recibo=document.getElementById('folio_recibo').value;

fecha_recibo=document.getElementById('fecha_recibo').value;

fecha_recibo_array=fecha_recibo.split("-");

	f_dia_recibo=fecha_recibo_array[2];
	f_mes_recibo=fecha_recibo_array[1];
	if(f_mes_recibo==01){
    f_mes_recibo="Enero"
	}else if (f_mes_recibo==02) {
		f_mes_recibo="Febrero"
	}else if(f_mes_recibo==03){
f_mes_recibo="Marzo"
	}else if(f_mes_recibo==04){
f_mes_recibo="Abril"
	}else if(f_mes_recibo==05){
f_mes_recibo="Mayo"
	}else if(f_mes_recibo==06){
f_mes_recibo="Junio"
	}else if(f_mes_recibo==07){
f_mes_recibo="Julio"
	}else if(f_mes_recibo==08){
f_mes_recibo="Agosto"
	}else if(f_mes_recibo==09){
f_mes_recibo="Septiembre"
	}else if(f_mes_recibo==10){
f_mes_recibo="Octubre"
	}else if(f_mes_recibo==11){
f_mes_recibo="Noviembre"
	}else if(f_mes_recibo==12){
f_mes_recibo="Diciembre"
	};
	f_anio_recibo=fecha_recibo_array[0];

	area_recibo=document.getElementById('area_recibo').value;
    vehiculo_recibo=document.getElementById('vehiculo_recibo');
	noeco_recibo=document.getElementById('noeco_recibo').value;
    cilindraje_recibo=document.getElementById('cilindraje_recibo').value;
	ofcom_recibo=document.getElementById('ofcom_recibo').value;
	comisionadoa_recibo=document.getElementById('comisionadoa_recibo').value;
	recorridoaprox_recibo=document.getElementById('recorridoaprox_recibo').value;
	monto_recibo=document.getElementById('monto_recibo').value;
	montoletra_recibo=document.getElementById('montoletra_recibo').value;
	litros_recibo=document.getElementById('litros_recibo').value;
	firma1_recibo=document.getElementById('firma1_recibo').value;
	firma2_recibo=document.getElementById('firma2_recibo').value;
	firma3_recibo=document.getElementById('firma3_recibo').value;
/*si estan vacios*/
  if (preciogas_recibo==""||destinode_recibo==""||destinoa_recibo==""||nomcon_recibo==""||folio_recibo==""|| fecha_recibo==""||area_recibo==""
  	||vehiculo_recibo==""||noeco_recibo==""||cilindraje_recibo==""||ofcom_recibo==""||comisionadoa_recibo==""||recorridoaprox_recibo==""
  	||monto_recibo==""||montoletra_recibo==""||litros_recibo==""||firma1_recibo==""||firma2_recibo==""||firma3_recibo==""){
	$('#timer').fadeOut(300);
var campos_recibo=[preciogas_recibo,destinode_recibo,destinoa_recibo,nomcon_recibo,folio_recibo,fecha_recibo,area_recibo,
  	vehiculo_recibo,noeco_recibo,cilindraje_recibo,ofcom_recibo,comisionadoa_recibo,recorridoaprox_recibo,monto_recibo,
  	montoletra_recibo,litros_recibo,firma1_recibo,firma2_recibo,firma3_recibo];
var campos_recibo_nombres=['preciogas_recibo','destinode_recibo','destinoa_recibo','nomcon_recibo','folio_recibo','fecha_recibo','area_recibo',
  	'vehiculo_recibo','noeco_recibo','cilindraje_recibo','ofcom_recibo','comisionadoa_recibo','recorridoaprox_recibo','monto_recibo',
  	'montoletra_recibo','litros_recibo','firma1_recibo','firma2_recibo','firma3_recibo'];
  	NewBox.alert("No Puedes Dejar Campos Vacios");
  for(var i=0; i<campos_recibo.length; i++){

    	if(campos_recibo[i]==""){

	document.getElementById(campos_recibo_nombres[i]).style.border="2px solid red";
    document.getElementById(campos_recibo_nombres[i]).addEventListener("click", restablecer, false);
    	}
    }/*termina for*/

}else{
insertarRecibo();
	 }
 }

function valida_fecha(obj) {
  patron = /^\d{2}\-\d{2}\-\d{4}$/;
  if (!patron.test(obj.value)) {
    document.getElementById('fecha_recibo').style.border="2px solid red";
    document.getElementById('fecha_recibo').addEventListener("click", restablecer, false);

    if (document.getElementById('fecha_recibo').value!="") {
    document.getElementById('msjs').style.display='block';
    document.getElementById('msjs').innerHTML="Ingresa una Fecha con el Formato DD-MM-AAAA"
    };
  }
}

function restablecer(){
	this.style.border="1px solid gray";
	document.getElementById('msjs').style.display='none';
}


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


function verificar_noeco(){ 

noeco_recibo=document.getElementById('noeco_recibo').value;
if(noeco_recibo!= ""){
datos_env3="noeco_recibo="+noeco_recibo;
solicitud3=crearObjeto();
$('#timer').fadeIn(300);
solicitud3.open("POST", "./php/valida_recibo.php", true);
solicitud3.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitud3.setRequestHeader("Content-lenght", datos_env3.length);
solicitud3.setRequestHeader("Connection", "close");
solicitud3.addEventListener("load", respuesta_val_noeco, false);
solicitud3.send(datos_env3);
calcularLitros();
}else{

    	document.getElementById('noeco_recibo').style.border="2px solid red";
    	document.getElementById('noeco_recibo').addEventListener("click", restablecer, false);
    }
}

function respuesta_val_noeco(){
	$('#timer').fadeOut(300);
/*para la primera solicitud*/
	if(solicitud3.readyState=4)
  {
  	lista = JSON.parse(solicitud3.responseText);
inf=lista['informe'];
if (inf=="¡ No se ha encontrado el Vehiculo en la Base de Datos Si Pretende usar este No. Eco de Vehiculo Primero Insertelo a la BD !") {
NewBox.alert(lista['informe']);

document.getElementById('litros_recibo').value=0;
document.getElementById('recorridoaprox_recibo').value=0;

document.getElementById('noeco_recibo').style.border="2px solid red";
document.getElementById('vehiculo_recibo').value=" ";
  	document.getElementById('cilindraje_recibo').value=" ";
  	document.getElementById('rpl_recibo').value=" ";
}else{
	document.getElementById('vehiculo_recibo').value=lista['marca_vehiculo'];
  	document.getElementById('cilindraje_recibo').value=lista['nocilintros_vehiculo'];
  	document.getElementById('rpl_recibo').value=lista['renl_vehiculo'];
  	document.getElementById('noeco_recibo').style.border="1px solid gray";
  	document.getElementById('vehiculo_recibo').style.border="1px solid gray";
  	document.getElementById('cilindraje_recibo').style.border="1px solid gray";
 };
  	
  	document.getElementById('n_e_v_r').innerHTML=lista['noeco_vehiculo'];
document.getElementById('n_i_v_r').innerHTML=lista['noinv_vehiculo'];
document.getElementById('l_v_r').innerHTML=lista['localidad_vehiculo'];
document.getElementById('mu_v_r').innerHTML=lista['municipio_vehiculo'];
document.getElementById('ma_v_r').innerHTML=lista['marca_vehiculo'];
document.getElementById('t_v_r').innerHTML=lista['tipo_vehiculo'];
document.getElementById('mo_v_r').innerHTML=lista['modelo_vehiculo'];
document.getElementById('pl_v_r').innerHTML=lista['placas_vehiculo'];
document.getElementById('n_i_v_v_r').innerHTML=lista['noid_vehiculo'];
document.getElementById('n_m_v_r').innerHTML=lista['nomotor_vehiculo'];
document.getElementById('n_c_v_r').innerHTML=lista['nocilintros_vehiculo'];
document.getElementById('r_pl_v_r').innerHTML=lista['renl_vehiculo'];
document.getElementById('as_v_r').innerHTML=lista['aseguradora_vehiculo'];
document.getElementById('po_v_r').innerHTML=lista['poliza_vehiculo'];
document.getElementById('exp_v_r').innerHTML=lista['exped_vehiculo'];
document.getElementById('vi_v_r').innerHTML=lista['vigencia_vehiculo'];
document.getElementById('ve_v_r').innerHTML=lista['verificacion_vehiculo'];
document.getElementById('t_s_v_r').innerHTML=lista['tiposerv_vehiculo'];
document.getElementById('e_f_v_r').innerHTML=lista['edofisico_vehiculo'];
  	



  /*$respuesta_valnoeco->km_vehiculo=$row['Kilometraje'];
  $respuesta_valnoeco->renl_vehiculo=$row['Rendimiento_p_litro'];*/

 
  }else{
  	alert("Registro no insertado Intente otra vez");
  }

}


function folio_recibo(){
	val_orig=document.getElementById('folio_recibo').value;
	if (val_orig=="0") {
		datos_env4="no_foliov="+val_orig;
solicitud4=crearObjeto();
$('#timer').fadeIn(300);
solicitud4.open("POST", "./php/valida_recibo1.php", true);
solicitud4.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitud4.setRequestHeader("Content-lenght", datos_env4.length);
solicitud4.setRequestHeader("Connection", "close");
solicitud4.addEventListener("load", respuesta_folio, false);
solicitud4.send(datos_env4);
	$('#timer').fadeOut(300);
	};

}

function reiniciar_recibo(){

	document.getElementById('destinoa_recibo').value="";
	document.getElementById('fecha_recibo').value="";
	document.getElementById('area_recibo').value="";
	document.getElementById('noeco_recibo').value="";
	document.getElementById('ofcom_recibo').value="";
	aa1=document.getElementById('folio_recibo').value;
datos_env5="no_foliov="+aa1;
solicitud5=crearObjeto();
$('#timer').fadeIn(300);
solicitud5.open("POST", "./php/valida_recibo1-1.php", true);
solicitud5.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitud5.setRequestHeader("Content-lenght", datos_env5.length);
solicitud5.setRequestHeader("Connection", "close");
solicitud5.addEventListener("load", respuesta_folio1, false);
solicitud5.send(datos_env5);
	$('#timer').fadeOut(300);	

	/*document.getElementById('folio_recibo').value="";*/
	document.getElementById('recorridoaprox_recibo').value="";
	document.getElementById('monto_recibo').value="";
	document.getElementById('montoletra_recibo').value="";
	document.getElementById('litros_recibo').value="";
	document.getElementById('nomcon_recibo').value="";
	document.getElementById('vehiculo_recibo').value="AUTO";
	document.getElementById('cilindraje_recibo').value="AUTO";
	document.getElementById('comisionadoa_recibo').value="";

}


function reiniciarFormVehiculo(){
	$('#timer').fadeIn(300);
document.getElementById('noeco_vehiculo').value="";
document.getElementById('noinv_vehiculo').value="";
document.getElementById('localidad_vehiculo').value="";
document.getElementById('municipio_vehiculo').value="";
document.getElementById('marca_vehiculo').value="";
document.getElementById('tipo_vehiculo').value="";
document.getElementById('modelo_vehiculo').value="";
document.getElementById('placas_vehiculo').value="";
document.getElementById('noid_vehiculo').value="";
document.getElementById('nomotor_vehiculo').value="";
document.getElementById('nocilintros_vehiculo').value="";
document.getElementById('aseguradora_vehiculo').value="";
document.getElementById('poliza_vehiculo').value="";
document.getElementById('exped_vehiculo').value="";
document.getElementById('vigencia_vehiculo').value="";
document.getElementById('verificacion_vehiculo').value="";
document.getElementById('km_vehiculo').value="";
document.getElementById('renl_vehiculo').value="";
document.getElementById('tiposerv_vehiculo').value="";
document.getElementById('edofisico_vehiculo').value="";
$('#timer').fadeOut(300);
}

function respuesta_folio(){

/*para la primera solicitud*/
	if(solicitud4.readyState=4)
  {
  	lista2 = JSON.parse(solicitud4.responseText);
  	document.getElementById('folio_recibo').value=lista2['foliofr'];

  }else{
  	alert("Error AJAX");
  }

}

function respuesta_folio1(){

/*para la primera solicitud*/
	if(solicitud5.readyState=4)
  {
  	lista3 = JSON.parse(solicitud5.responseText);
  	document.getElementById('folio_recibo').value=lista3['foliofr1'];


  }else{
  	alert("Error AJAX");
  }

}

/*valida el vehiculo*/

function validarVehiculo(){
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

	
/*si estan vacios*/
  if (noeco_vehiculo==""||noinv_vehiculo==""||localidad_vehiculo==""||municipio_vehiculo==""||marca_vehiculo==""|| tipo_vehiculo==""||modelo_vehiculo==""
  	||placas_vehiculo==""||km_vehiculo==""||noid_vehiculo==""||nomotor_vehiculo==""||nocilintros_vehiculo==""||renl_vehiculo==""
  	||aseguradora_vehiculo==""||poliza_vehiculo==""||exped_vehiculo==""||vigencia_vehiculo==""||verificacion_vehiculo==""||tiposerv_vehiculo==""||edofisico_vehiculo==""){
	$('#timer').fadeOut(300);
var campos_vehiculo=[noeco_vehiculo,noinv_vehiculo,localidad_vehiculo,municipio_vehiculo,marca_vehiculo,tipo_vehiculo,modelo_vehiculo,
  	placas_vehiculo,km_vehiculo,noid_vehiculo,nomotor_vehiculo,nocilintros_vehiculo,renl_vehiculo,
  	aseguradora_vehiculo,poliza_vehiculo,exped_vehiculo,vigencia_vehiculo,verificacion_vehiculo,tiposerv_vehiculo,edofisico_vehiculo];
var campos_vehiculo_nombres=['noeco_vehiculo','noinv_vehiculo','localidad_vehiculo','municipio_vehiculo','marca_vehiculo','tipo_vehiculo','modelo_vehiculo',
  	'placas_vehiculo','km_vehiculo','noid_vehiculo','nomotor_vehiculo','nocilintros_vehiculo','renl_vehiculo',
  	'aseguradora_vehiculo','poliza_vehiculo','exped_vehiculo','vigencia_vehiculo','verificacion_vehiculo','tiposerv_vehiculo','edofisico_vehiculo'];
  	NewBox.alert("No Puedes Dejar Campos Vacios");
  for(var i=0; i<campos_vehiculo.length; i++){

    	if(campos_vehiculo[i]==""){

	document.getElementById(campos_vehiculo_nombres[i]).style.border="2px solid red";
    document.getElementById(campos_vehiculo_nombres[i]).addEventListener("click", restablecer, false);
    	}
    }/*termina for*/

}else{
insertarVehiculo();
	 }
 }

 function valida_fecha1(obj) {
  patron = /^\d{4}\-\d{2}\-\d{2}$/;
  if (!patron.test(obj.value)) {
    document.getElementById('exped_vehiculo').style.border="2px solid red";
    document.getElementById('exped_vehiculo').addEventListener("click", restablecer, false);

    if (document.getElementById('exped_vehiculo').value!="") {
    document.getElementById('msjs').style.display='block';
    document.getElementById('msjs').innerHTML="Ingresa una Fecha con el Formato AAAA-MM-DD"
    };
  }
}

 function valida_fecha2(obj) {
  patron = /^\d{4}\-\d{2}\-\d{2}$/;
  if (!patron.test(obj.value)) {
    document.getElementById('vigencia_vehiculo').style.border="2px solid red";
    document.getElementById('vigencia_vehiculo').addEventListener("click", restablecer, false);

    if (document.getElementById('vigencia_vehiculo').value!="") {
    document.getElementById('msjs').style.display='block';
    document.getElementById('msjs').innerHTML="Ingresa una Fecha con el Formato AAAA-MM-DD"
    };
  }
}

function calcularpl(){
	nocilintros_vehiculo=document.getElementById('nocilintros_vehiculo').value;
if (nocilintros_vehiculo==4) {
	renl_vehiculo=6;
	document.getElementById('renl_vehiculo').value=renl_vehiculo;
}else if (nocilintros_vehiculo==6) {
	renl_vehiculo=5;
	document.getElementById('renl_vehiculo').value=renl_vehiculo;
}else if (nocilintros_vehiculo==8) {
	renl_vehiculo=4;
	document.getElementById('renl_vehiculo').value=renl_vehiculo;
};
}

function validaConsultarReporte(){
		valfrc=document.getElementById('folio_rep_cons').value;
	if (valfrc=="") {
		document.getElementById('folio_rep_cons').style.border="2px solid red";
		 document.getElementById('folio_rep_cons').addEventListener("click", restablecer, false);
alert("inserta algo");
	}else{
	consultarReporte();
	};
}

function validaConsultarRecibo(){
		aniorc=document.getElementById('anio_consulta').value;
		foliorc=document.getElementById('folio_consulta').value;
	if (aniorc=="" ) {
		document.getElementById('anio_consulta').style.border="2px solid red";
document.getElementById('anio_consulta').addEventListener("click", restablecer, false);
alert("inserta un año");
	}else if (foliorc=="") {
document.getElementById('folio_consulta').style.border="2px solid red";
document.getElementById('folio_consulta').addEventListener("click", restablecer, false);
alert("inserta un folio");
	}else{
	consultarRecibo();
	};
}

function validaConsultarVale(){
		aniovc=document.getElementById('anio_consulta_vale').value;
		numvc=document.getElementById('novale_cons').value;
	if (aniovc=="" ) {
		document.getElementById('anio_consulta_vale').style.border="2px solid red";
document.getElementById('anio_consulta_vale').addEventListener("click", restablecer, false);
alert("inserta un año");
	}else if (numvc=="") {
document.getElementById('novale_cons').style.border="2px solid red";
document.getElementById('novale_cons').addEventListener("click", restablecer, false);
alert("inserta un numero");
	}else{
	consultarVale();
	};
}



function validaConsultarRecibo(){
		aniorc=document.getElementById('anio_consulta').value;
		foliorc=document.getElementById('folio_consulta').value;
	if (aniorc=="" ) {
		document.getElementById('anio_consulta').style.border="2px solid red";
document.getElementById('anio_consulta').addEventListener("click", restablecer, false);
alert("inserta un año");
	}else if (foliorc=="") {
document.getElementById('folio_consulta').style.border="2px solid red";
document.getElementById('folio_consulta').addEventListener("click", restablecer, false);
alert("inserta un folio");
	}else{
	consultarRecibo();
	};
}

function validaConsultarVehiculo(){
		numvehc=document.getElementById('novehiculo_cons').value;

	if (numvehc=="") {
		document.getElementById('novehiculo_cons').style.border="2px solid red";
document.getElementById('novehiculo_cons').addEventListener("click", restablecer, false);
alert("inserta un numero");
	}else{
	consultarVehiculo();
	/*alert("siggue aqui");*/
	};
}

function validaCambrPssw(){
	pact=document.getElementById('password_actual_cmbr').value;
	pnva1=document.getElementById('password_new_cmbr').value;
    pnva2=document.getElementById('password_new1_cmbr').value;

    if (pact=="") {/*si esta vacio el 1er campo*/

    document.getElementById('password_actual_cmbr').style.border="2px solid red";
    document.getElementById('password_actual_cmbr').addEventListener("click", restablecer, false);
    }else if (pnva1=="") {/*si esta vacio el segundo campo*/

document.getElementById('password_new_cmbr').style.border="2px solid red";
    document.getElementById('password_new_cmbr').addEventListener("click", restablecer, false);

    }else if (pnva2=="") {/*si esta vacio el tercer campo*/

document.getElementById('password_new1_cmbr').style.border="2px solid red";
    document.getElementById('password_new1_cmbr').addEventListener("click", restablecer, false);
        
    }else{/*cuando todos los campos estan llenos*/


contraseñapCambiar="contraseñapCambiar="+pact;
solicitudcpssw=crearObjeto();
$('#timer').fadeIn(300);
solicitudcpssw.open("POST", "./php/procCambiarPssw.php", true);
solicitudcpssw.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudcpssw.setRequestHeader("Content-lenght", contraseñapCambiar.length);
solicitudcpssw.setRequestHeader("Connection", "close");
solicitudcpssw.addEventListener("load", respcp, false);
solicitudcpssw.send(contraseñapCambiar);
	$('#timer').fadeOut(300);

    };


}

function respcp(){
	listcpc=JSON.parse(solicitudcpssw.responseText);
	if (listcpc['si_no']==1) {/*si la contraseña actual esta bien*/
		
                    if (pnva2==pnva1) {/*si las contraseñas nuevas coinciden*/
         cambiarContrasenia(pnva1);/*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Final Cuando todo esta bien*/
        }else {
         NewBox.error("Las contraseñas NO Coinciden");
         document.getElementById('password_new_cmbr').style.border="2px solid red";
    document.getElementById('password_new_cmbr').addEventListener("click", restablecer, false);
document.getElementById('password_new1_cmbr').style.border="2px solid red";
    document.getElementById('password_new1_cmbr').addEventListener("click", restablecer, false);
        };

	}else if (listcpc['si_no']==0) {/*si la contraseña es incorrecta*/
        NewBox.error(listcpc['informe']);
        document.getElementById('password_actual_cmbr').style.border="2px solid red";
    document.getElementById('password_actual_cmbr').addEventListener("click", restablecer, false);
	};
}


function validaGR(){
	
	noecogr=document.getElementById('novehiculo_rep').value;
	mes_fv=document.getElementById('mes_fv').value;
	anio_fv=document.getElementById('anio_fv').value;

	if (noecogr=="") {
		document.getElementById('novehiculo_rep').style.border="2px solid red";
		document.getElementById('novehiculo_rep').addEventListener("click", restablecer, false);
		alert("Ingresa un No eco. Para Realizar la Consulta");
	}else if (mes_fv=="") {
		document.getElementById('mes_fv').style.border="2px solid red";
		document.getElementById('mes_fv').addEventListener("click", restablecer, false);
		alert("Ingresa un Mes Para Realizar la Consulta");
	}else if (anio_fv=="") {
		document.getElementById('anio_fv').style.border="2px solid red";
		document.getElementById('anio_fv').addEventListener("click", restablecer, false);
		alert("Ingresa un Año Para Realizar la Consulta");
	}else{
	  
		/*document.bitacora_vehiculo.submit();*/
		muestraRepim();
	};
}

function generarRep(){

noecogr=document.getElementById('novehiculo_rep').value;
	mes_fv=document.getElementById('mes_fv').value;
	anio_fv=document.getElementById('anio_fv').value;
		factura_rep=document.getElementById('factura_rep').value;

	if (noecogr=="") {
		document.getElementById('novehiculo_rep').style.border="2px solid red";
		document.getElementById('novehiculo_rep').addEventListener("click", restablecer, false);
		alert("Ingresa un No eco. Para Realizar la Consulta");
	}else if (mes_fv=="") {
		document.getElementById('mes_fv').style.border="2px solid red";
		document.getElementById('mes_fv').addEventListener("click", restablecer, false);
		alert("Ingresa un Mes Para Realizar la Consulta");
	}else if (anio_fv=="") {
		document.getElementById('anio_fv').style.border="2px solid red";
		document.getElementById('anio_fv').addEventListener("click", restablecer, false);
		alert("Ingresa un Año Para Realizar la Consulta");
	}else if (factura_rep=="") {
		document.getElementById('factura_rep').style.border="2px solid red";
		document.getElementById('factura_rep').addEventListener("click", restablecer, false);
		alert("Ingresa un Numero de Factura Para Generar la Bitacora");
	}else{
document.bitacora_vehiculo.submit();

  Folio_reporte=1;

var fecha=new Date() 
var anio=fecha.getYear()
if (anio < 1000) 
anio+=1900 
var dia=fecha.getDay() 
var mes=fecha.getMonth() 
var diam=fecha.getDate() 
if (diam<10) 
diam="0"+diam 
var arreglodia=new Array("Domingo, ","Lunes, ","Martes, ","Miércoles, ","Jueves, ","Viernes, ","Sábado, ")
var arreglomes=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre")


  Fecha_realizacion=arreglodia[dia]+" "+diam+" de "+arreglomes[mes]+" de "+anio;
  Mes=mes_fv;
  Anio=anio_fv;
  Factura=factura_rep;
  No_Eco_U_T=noecogr;
  tabrep=(document.getElementById("tabrep").rows.length)-4;
  No_total_vales=tabrep;
  Total_recorrido=document.getElementById("sumaRecorrido").innerHTML;
  Total_importe=document.getElementById("sumaImporte").innerHTML;
  Total_litros=document.getElementById("sumaLitros").innerHTML;
  Observaciones=document.getElementById("obs").value;
  Nombre_elaboro=document.getElementById("elaboro_bitac").value;
  Nombre_vobo=document.getElementById("vobo_bitac").value;
  Nombre_autorizo=document.getElementById("autorizo_bitac").value;

		datos_envbitacora="Folio_reporte="+Folio_reporte+"&Fecha_realizacion="+Fecha_realizacion+"&Mes="+Mes+
		"&Anio="+Anio+"&Factura="+Factura+"&No_Eco_U_T="+No_Eco_U_T+"&No_total_vales="+No_total_vales+
		"&Total_recorrido="+Total_recorrido+"&Total_importe="+Total_importe+"&Total_litros="+Total_litros+
		"&Observaciones="+Observaciones+"&Nombre_elaboro="+Nombre_elaboro+"&Nombre_vobo="+Nombre_vobo+"&Nombre_autorizo="+Nombre_autorizo;
solicitudgbv=crearObjeto();
$('#timer').fadeIn(300);
solicitudgbv.open("POST", "./php/reporteInserta.php", true);
solicitudgbv.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudgbv.setRequestHeader("Content-lenght", datos_envbitacora.length);
solicitudgbv.setRequestHeader("Connection", "close");
solicitudgbv.addEventListener("load", respuesta_gdbv, false);
solicitudgbv.send(datos_envbitacora);
	$('#timer').fadeOut(300);


	
};/*termina else*/
}/*termina funcion*/

function respuesta_gdbv(){
	/*alert(solicitudgbv.responseText);*/
}


	/*if (noecogr=="") {
		document.getElementById('novehiculo_rep').style.border="2px solid red";
		document.getElementById('novehiculo_rep').addEventListener("click", restablecer, false);
		alert("Ingresa un No eco. Para Realizar la Consulta");
	}else if (fechagr=="") {
		document.getElementById('mes_rep').style.border="2px solid red";
		document.getElementById('mes_rep').addEventListener("click", restablecer, false);
		alert("Ingresa una Fecha Para Realizar la Consulta");
	}else{ 
		generaReporteVehiculo()
	};
}*/


function validaCUT(){
	
	elaborocut=document.getElementById('elaborocut').value;

	if (elaborocut=="") {
		document.getElementById('elaborocut').style.border="2px solid red";
		document.getElementById('elaborocut').addEventListener("click", restablecer, false);
		alert("Ingresa un Nombre");
	}else{
		document.catalogout.submit();
	};
}


function validaIMPREC(){
	
	mes_ir=document.getElementById('mes_mr').value;
	anio_ir=document.getElementById('anio_mr').value;

if (mes_ir=="") {
		document.getElementById('mes_mr').style.border="2px solid red";
		document.getElementById('mes_mr').addEventListener("click", restablecer, false);
		alert("Ingresa un Mes Para Realizar la Consulta");
	}else if (anio_ir=="") {
		document.getElementById('anio_mr').style.border="2px solid red";
		document.getElementById('anio_mr').addEventListener("click", restablecer, false);
		alert("Ingresa un Año Para Realizar la Consulta");
	}else{
	  
		document.recibos_PDF.submit();

	};
}

function validart(){
	val2="val="+1;
solicitudvt2=crearObjeto();
$('#timer').fadeIn(300);
solicitudvt2.open("POST", "./php/verificarTabla.php", true);
solicitudvt2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
solicitudvt2.setRequestHeader("Content-lenght", val2.length);
solicitudvt2.setRequestHeader("Connection", "close");
solicitudvt2.addEventListener("load", respuestaverbtabla2, false);
solicitudvt2.send(val2);
	$('#timer').fadeOut(300);
}

function respuestaverbtabla2(){
	listavt2=JSON.parse(solicitudvt2.responseText);
	if (listavt2["informe"]=="ACTUAL") {
		reiniciaTabla();
	}else NewBox.error("Selecciona Las Tablas Actuales");

}