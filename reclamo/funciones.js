$(function(){
	$('#nuevo-producto').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();

		setTimeout(function (){
            $('#rconsorcio').focus();
        }, 1000);

		$('#registra-producto').modal({
			show:true,
		});
		
	});
});
                                
function agregaRegistro(){
	var url = '../reclamo/alta_registro.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();	
			$('#agrega-registros').html(registro);
			$('#pro').val('Registro');

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
	var url = '../reclamo/mod_registro.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'idreclamo='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');

				$('#idreclamo').val(id);
				$('#rconsorcio').val(datos[0]);
				$('#ruf').val(datos[1]);
				$('#rpiso').val(datos[2]);
				$('#rdepto').val(datos[3]);
				$('#rtitular').val(datos[4]);
				$('#rtelefono').val(datos[5]);
				$('#remail').val(datos[6]);
				$('#rllave').val(datos[7]);
				$('#rfecha').val(datos[8]);
				$('#rproveedor').val(datos[9]);
				$('#rfactura').val(datos[10]);
				$('#rfechapago').val(datos[11]);
				$('#rcheque').val(datos[12]);
				$('#rreclamo').val(datos[13]);
				$('#robservaciones').val(datos[14]);
				$('#rreclamo_estado').val(datos[15]);

				setTimeout(function (){
			        $('#rconsorcio').focus();
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
				});
			return false;
		}
	});
	return false;
}

function finalizarProducto(id){
	var url = '../reclamo/baja_registro.php';
	var pregunta = confirm('¿Seguro de finalizar este registro?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'idreclamo='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}



function eliminarProducto(id){
	var url = '../reclamo/eliminar_registro.php';
	var pregunta = confirm('¿Seguro de eliminar este registro?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'idreclamo='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}


function restaurarProducto(id){
	var url = '../reclamo/restaurar_registro.php';
	var pregunta = confirm('¿Seguro de restaurar este registro?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'idreclamo='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}


function baja_noti(id){
	var url = 'reclamo/baja_notificaciones.php';

		$.ajax({
		type:'POST',
		url:url,
		data:'idnotificaciones='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;

}




function infoProducto(id){
	var url = '../reclamo/info_registro.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'idreclamo='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;

}