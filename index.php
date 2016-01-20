
<?php session_start(); ?>


<!DOCTYPE html>

<html lang="es">
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sistema de Control de Vales</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon"/>
    <link rel="stylesheet" href="css/style.css" media="screen, print" />
    <link rel="stylesheet" href="css/alertbox.css" media="all" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/validation.js"></script>
    <script type="text/javascript" src="js/functions_system.js"></script>
    <script type="text/javascript" src="js/functions_login.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/NewBox.v1.2.jquery.js"></script>
    <!--[if lt IE 9]>
<script src="js/IE9.js"></script>
<script>NewBox.error("Error!!!!El sistema no funciona correctamente<br> con esta versión de navegador <br> porfavor actualizalo o abrelo con otro <br> (Chrome, Mozilla, etc)");</script>
<![endif]-->
    
    <script>
$(window).load(function () {
$('#cargando').hide();
respaldo();
});
</script>
<?php
if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){
  echo '<script>
function cambio(url){
  $("#content").load(url);
}
</script>';
}
    else{
  echo '<script>
function cambio(url){
  NewBox.error("Primero Tienes que Iniciar Sesión.");
}</script>';}
      ?>
    <!--[if lt IE 9]>
<script type="text/javascript">
   document.createElement("nav");
   document.createElement("header");
   document.createElement("footer");
   document.createElement("section");
   document.createElement("article");
   document.createElement("aside");
   document.createElement("hgroup");
</script>
<![endif]-->

</head>
<body>

<div id="cargando">
<img src="img/load.gif">
</div>
    <div id="all">
    <header>
    	<div id="logo">
            <img src="img/logo_black.png" alt="Logo del Sistema">
        </div>
        <div id="fecha">
            <script type="text/javascript">
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
      document.write(arreglodia[dia]+"  "+diam+" de "+arreglomes[mes]+" de "+anio);
      </script>
      </div>
        <div id="cont-der">
          <div id="logo_ssh"> 
          <img src="img/ssh_logo_solo.png" alt="Logo de SSH">
              </div> 
        <hgroup> 
        <h1>Jurisdicción Sanitaria No. 17</h1>
        <h2>Zacualtipán de Ángeles Hidalgo.</h2>
        </hgroup>
         <nav>  
             <ul>
                 <li><a href="index.php">Inicio</a></li>
                 <li><a href="javascript:cambio('phpenlaces/insertar.php');">Insertar</a></li>
                 <li><a href="javascript:cambio('phpenlaces/consultar.php');">Consultar</a></li>
                 <li><a href="javascript:cambio('phpenlaces/reportes.php');">Reportes</a></li>
                 <li><a href="javascript:cambio('phpenlaces/cmbr_pss.php');">Opciones</a></li>
                 <li><a href="javascript:void(0);" id="sessionKiller">Salir</a></li>
             </ul>
         </nav>
         <div class="clearfix"></div>
<div id="info_sesion">
<?php
if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){
  echo '<span class="blanco" id="ctrue"><img id="sesion" src="img/sesion_iniciada.gif"></span>';
}
    else{
  echo '<span class="blanco" id="cfalse"><img id="sesion" src="img/inicia_sesion.gif" onclick="javascript:colorc();"></span>';
}
      ?>

</div>
</div>

         <div class="clearfix"></div>
        </header>
                <h1 class="lazo-span" id="lazo-enc"></h1>
                <div id="msjs">
</div>
                 <div id="content">  

<?php
if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){
  echo '<script>document.getElementById("lazo").style.display= "none";</script>
  <div class="clearfix"></div>

 <div id="bienvenida">
   <span id="opc_reinic"><a id="opc" href="javascript:opc_rein();">----- REINICIAR TABLAS DE VALES Y RECIBOS -----</a></span>
<div class="clearfix"></div>
<div id="bienv">
<img id="img-bienv" src="img/bienvenido.gif">
<div class="clearfix"></div>
<img id="img-bienv-logo" src="img/logo.gif" >

 </div>
 </div>
 <div id="opcrein">
 <span id="op1rcc"><a id="op1rc" href="javascript:validart();"> > Iniciar Un Nuevo Año</a></span>
  <span id="ind">Para Iniciar un Nuevo Año Tienen Que estar Seleccionadas Las Tablas Actuales.<br>Los contadores de folio del recibo y numero de vale empezaran desde 1, la informacion que visualiza actualmente quedará almacenada
  en la base de datos y podra ser consultada posteriormente Hasta que vuelva a iniciar un nuevo año.<br>Para cambiar de tabla selecionela en la siguiente opción.<br>
  Se guardan solamente dos tablas; la que usa actualmente y la que se crea. <br>
  Las Demás se eliminarán y no podrán ser recuperadas</span>  <div class="clearfix"></div>
 
 <span id="op2rcc"><br> > Seleccionar Tablas</span>
 <br><div class="clearfix"></div>

              <select id="tablas" class="leftfloat">
              <option value="">SELECCIONA</option>
              <option value="ACTUAL">1.- AÑO ACTUAL</option>
              <option value="ANTERIOR">1.- AÑO ANTERIOR</option>
              </select><br><div id="met"></div>
              <div class="clearfix"></div>
              <div id="opciones_consultar" >
             <span class="boton_consultar"><a href="javascript:cambiaTabla();" class="enlace_consultar">Aceptar</a></span>
         </div>
 </div>

<div class="clearfix"></div>
  ';
}
    else{
  echo '<div id="lazo" class="efecto3"> 
                 <h1 class="lazo-span" id="lazo-entrar">Entrar:</h1>
               <div id="msj-login" >Ingresa la contraseña para poder entrar:</div>
               <form id="login" action="" method="POST" name="login_form">
                <div>
        <input type="text" value="ADMINISTRADOR" id="name_user" class="text1" name="name_user" readonly>
      </div>
      <div>
        <input type="password" placeholder="Contraseña" required="" id="password_user" name="password_user"/>
      </div>
      <div>
        <br>
        <input type="button" value="INICIAR" id="login_userbttn"/>
      </div>
    </form>
               </div>

               <div class="clearfix"></div>';
}
      ?>


     
              
</div>  
  <span class="timer" id="timer"></span>
<div class="clearfix"></div>

    <footer>
      <h1 class="lazo-span" id="lazo-pie"></h1>
  <div id="l_izq"><img src="img/logo_black.png" alt="Logo del Sistema"></div>
    <p class="texto_pie_1" >Copyright 2014 | Carlos Montiel Medina</p>
    <div id="l_der"><img src="img/logo_black.png" alt="Logo del Sistema"></div>
              
    <div id="logos_pie">
    <div id="logo_html"><img src="img/HTML5_logo.png"></div>
    <div id="logo_js"><img src="img/JS_logo.png"></div>
    <div id="logo_css"><img src="img/CSS3_logo.png"></div>
             <div class="clearfix"></div>
    </div>

    <br>
             <div class="clearfix"></div>
    </footer>
</div>
</body>
</html>
