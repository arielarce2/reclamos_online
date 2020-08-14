


function editarimg(id){
		$.ajax({
				type: 'POST',
				data: 'idreclamo='+id,
				url: '../reclamo_foto/mod_registro.php',
				success: function(data){
						$('#registra-producto3').modal({
								show:true,
								backdrop:'static',
						});
						$('#resultado').html(data);
				}
			});
		return false;
}


 $(function(){
        $("input[name='file']").on("change", function(){
            var formData = new FormData($("#formulario2")[0]);
            var ruta = "../reclamo_foto/subir-imagen.php";
            $('#mensaje3').addClass('bien').html('<div class="alert alert-info" role="alert">Cargando..</div><br>').show(200).delay(2000);
            $.ajax({
            	
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
					$('#formulario2')[0].reset();
                    $('#resultado').html(datos);
                    $('#mensaje3').hide(200);
                }

            });
        });
     });


function eliminarProductoimg(id){
	var url = '../reclamo_foto/baja_registro.php';
	var pregunta = confirm('¿Esta seguro de eliminar el registro?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'idreclamo_foto='+id,
		success: function(registro){
			$('#resultado').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}


function arribaProductoimg(id){
	var url = '../reclamo_foto/arriba_registro.php';

		$.ajax({
		type:'POST',
		url:url,
		data:'idreclamo_foto='+id,
		success: function(registro){
			$('#resultado').html(registro);
			return false;
		}
	});
	return false;

}


function abajoProductoimg(id){
	var url = '../reclamo_foto/abajo_registro.php';

		$.ajax({
		type:'POST',
		url:url,
		data:'idreclamo_foto='+id,
		success: function(registro){
			$('#resultado').html(registro);
			return false;
		}
	});
	return false;

}



