$(function(){
	$('#nuevo-producto').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();

		setTimeout(function (){
            $('#nombre').focus();
        }, 1000);


		$(document).ready(function() {
		    $("#formulario").keypress(function(e) {
		        if (e.which == 13) {
		            return false;
		        }
		    });
		});

		$('#registra-producto').modal({
			show:true,
			backdrop:'static',
		});
		
	});
});
                                
function agregaRegistro(){
	var url = 'usuario/alta_registro.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#agrega-registros').html(registro);
			$('#pro').val('Registro')
			$('#registra-producto').modal('hide');
			return false;
			}else{
			$('#agrega-registros').html(registro);
			$('#registra-producto').modal('hide');
			return false;
			}
		}
	});
	return false;
}


function editarProducto(id){
	$('#formulario')[0].reset();
	var url = 'usuario/mod_registro.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'idusuario='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');

				$('#idusuario').val(id);

				$('#email').val(datos[0]);
				$('#nom').val(datos[1]);
				$('#ape').val(datos[2]);
				$('#dire').val(datos[3]);
				$('#tel').val(datos[4]);
				$('#contra').val(datos[5]);

				setTimeout(function (){
			        $('#dni').focus();
			    }, 1000);


				$(document).ready(function() {
				    $("#formulario").keypress(function(e) {
				        if (e.which == 13) {
				            return false;
				        }
				    });
				});


				$('#registra-producto').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}