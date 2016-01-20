$(document).ready(function(){
	
	var timeSlide = 1000;
	$('#password_user').focus();
	$('#timer').hide(0);
	$('#timer').css('display','none');
	$('#login_userbttn').click(function(){
		$('#timer').fadeIn(300);
		$('.box-info, .box-success, .box-alert, .box-error').slideUp(timeSlide);
		setTimeout(function(){
			if ( $('#name_user').val() != "" && $('#password_user').val() != "" ){
				
				$.ajax({
					type: 'POST',
					url: './php/procesar_login.php',
					data: 'name_user=' + $('#name_user').val() + '&password_user=' + $('#password_user').val(),
					success:function(msj){
						if ( msj == 1 ){
							$('#msj-login').html('<div class="box-success"></div>');
							$('.box-success').hide(0).html('Espera un momento...');
							$('.box-success').slideDown(timeSlide);
							setTimeout(function(){
								window.location.href = ".";
							},(timeSlide + 500));
						}
						else{
							$('#msj-login').html('<div class="box-error"></div>');
							$('.box-error').hide(0).html('Has Ingresado una Contraseña Incorrecta!');
							$('.box-error').slideDown(timeSlide);
						}
						$('#timer').fadeOut(300);
					},
					error:function(){
						$('#timer').fadeOut(300);
						$('#msj-login').html('<div class="box-error"></div>');
						$('.box-error').hide(0).html('Ha ocurrido un error durante la ejecución');
						$('.box-error').slideDown(timeSlide);
					}
				});
				
			}
			else{
				$('#msj-login').html('<div class="box-alert"></div>');
				$('.box-alert').hide(0).html('Tienes que Ingresar una Contraseña!');
				$('.box-alert').slideDown(timeSlide);
				$('#timer').fadeOut(300);
			}
		},timeSlide);
		
		return false;
		
	});
	
	
	
	$('#sessionKiller').click(function(){
		$('#timer').fadeIn(300);
		$('#alertBoxes').html('<div class="box-success"></div>');
		$('.box-success').hide(0).html('Espera un momento&#133;');
		$('.box-success').slideDown(timeSlide);
		setTimeout(function(){
			window.location.href = "./php/logout.php";
		},2500);
	});
	
});
