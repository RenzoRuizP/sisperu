
$(document).ready(function(){

	//activarInput();

});


function activarInput(){
	$('#nombres').attr( "disabled", true );
	$('#apellidos').attr( "disabled", true );

	$('#f_nacimiento').attr( "disabled", true );
	$('#celular').attr( "disabled", true );

	$('#email').attr( "disabled", true );
	$('#direccion').attr( "disabled", true );

	$('#departamento_id').attr( "disabled", true );
	$('#provincia_id').attr( "disabled", true );
	$('#distrito_id').attr( "disabled", true );

	// EMPRESA

	$('#razon_social').attr( "disabled", true );
	$('#nombre_comercial').attr( "disabled", true );

	$('#telefono_empresa').attr( "disabled", true );
	$('#direccionE').attr( "disabled", true );

	$('#emailE').attr( "disabled", true );

	$('.departamento_idE').attr( "disabled", true );
	$('.provincia_idE').attr( "disabled", true );
	$('.distrito_idE').attr( "disabled", true );

}

function desactivarInput(){
	$('#nombres').attr( "disabled", false );
	$('#apellidos').attr( "disabled", false );

	$('#f_nacimiento').attr( "disabled", false );
	$('#celular').attr( "disabled", false );

	$('#email').attr( "disabled", false );
	$('#direccion').attr( "disabled", false );

	$('#departamento_id').attr( "disabled", false );
	$('#provincia_id').attr( "disabled", false );
	$('#distrito_id').attr( "disabled", false );


	// EMPRESA

	$('#razon_social').attr( "disabled", false );
	$('#nombre_comercial').attr( "disabled", false );

	$('#telefono_empresa').attr( "disabled", false );
	$('#direccionE').attr( "disabled", false );

	$('#emailE').attr( "disabled", false );

	$('.departamento_idE').attr( "disabled", false );
	$('.provincia_idE').attr( "disabled", false );
	$('.distrito_idE').attr( "disabled", false );
}


$("#guardar_cliente").on('click', function(){
	let _id = $(this).data('id');
	demo.showSwal('confirm', 'registrar', 'registrar cliente', function(){
		$('#registrar_cliente').submit();
	})
});


$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _nombre = $(this).data('nombre');

	$.ajax({
		url: _url_web_+'/mantenimiento/cliente/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		//activarInput();
		let _modal = $("#modal_cliente");
		
		_modal.find("#registrar_cliente").attr('action', _url_web_+'/mantenimiento/cliente/'+_id);
		_modal.find("#registrar_cliente").append('<input type="hidden" name="_method" value="PUT">');

		
	// PERSONA
	if(data.tipo_documento){

		_modal.find('select[name="tipo_documento"]').val(data.tipo_documento);
		_modal.find('input[name="doc_id"]').val(data.numero_documento);
		_modal.find('input[name="apellidos"]').val(data.apellidos);
		_modal.find('input[name="nombres"]').val(data.nombres);
		_modal.find('input[name="f_nacimiento"]').val(data.fecha_nacimiento);
		_modal.find('input[name="celular"]').val(data.telefono);
		_modal.find('input[name="email"]').val(data.email);
		_modal.find('input[name="direccion"]').val(data.direccion);

		_modal.find('input[name="ruc"]').val("");
		_modal.find('input[name="razon_social"]').val("");
		_modal.find('input[name="nombre_comercial"]').val("");
		_modal.find('input[name="telefono_empresa"]').val("");
		_modal.find('input[name="direccionE"]').val("");
		_modal.find('input[name="emailE"]').val("");
	}else{
	//EMPRESA

		_modal.find('input[name="ruc"]').val(data.ruc);
		_modal.find('input[name="razon_social"]').val(data.razon_social);
		_modal.find('input[name="nombre_comercial"]').val(data.nombre);
		_modal.find('input[name="telefono_empresa"]').val(data.telefono);
		_modal.find('input[name="direccionE"]').val(data.direccion);
		_modal.find('input[name="emailE"]').val(data.correo);

		_modal.find('select[name="tipo_documento"]').val("");
		_modal.find('input[name="doc_id"]').val("");
		_modal.find('input[name="apellidos"]').val("");
		_modal.find('input[name="nombres"]').val("");
		_modal.find('input[name="f_nacimiento"]').val("");
		_modal.find('input[name="celular"]').val("");
		_modal.find('input[name="email"]').val("");
		_modal.find('input[name="direccion"]').val("");

	}	

		cargarComboUbigeo(data.distrito.provincia.departamento.id, data.distrito.provincia.id, data.distrito.id);
		//desactivarInput();
		_modal.modal('show');
	});
	//desactivarInput();

	
})

$(".btn-eliminar").on('click', function() {
	let _id = $(this).data('id');
	$("#cliente_eliminar").attr('action', _url_web_+'/mantenimiento/cliente/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar cliente', function(){
		$("#cliente_eliminar").submit();
	})
});

$("#modal_cliente").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_cliente")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_cliente").attr('action',_url_web_+'/mantenimiento/cliente'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_cliente").find('input[name="_token"]').val($("#clienteeliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_cliente").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});
// buscar documento PERSONA
$('input[name = "doc_id"]').on('blur', function(){
	let _doc = $('input[name = "doc_id"]').val();
	//alert(_url_web_+'/consulta/persona/existeDocumento');
	let _tipo = $('select[name = "tipo_documento"]').val();
	$.ajax({
		url: _url_web_+'/consulta/persona/existeDocumento',
		type: 'get',
		dataType: 'json',
		data:{tdocumento:_tipo,ndocumento:_doc}
	})
	.done(function(data) {
		
		let _modal = $("#modal_cliente");
		let _num_doc = data.numero_documento;
		_modal.find("#registrar_cliente").attr('action', _url_web_+'/mantenimiento/cliente/'+_doc);
		_modal.find("#registrar_cliente").append('<input type="hidden" name="_method" value="PUT">');
		if(_num_doc){ //PERSONA
			//activarInput();
			_modal.find('input[name="apellidos"]').val(data.apellidos);
			_modal.find('input[name="nombres"]').val(data.nombres);
			_modal.find('input[name="f_nacimiento"]').val(data.fecha_nacimiento);
			_modal.find('input[name="celular"]').val(data.telefono);
			_modal.find('input[name="email"]').val(data.email);
			_modal.find('input[name="direccion"]').val(data.direccion);
		
		}else{ 
			//desactivarInput();
			_modal.find('input[name="apellidos"]').val("");
			_modal.find('input[name="nombres"]').val("");
			_modal.find('input[name="f_nacimiento"]').val("");
			_modal.find('input[name="celular"]').val("");
			_modal.find('input[name="email"]').val("");
			_modal.find('input[name="direccion"]').val("");
			
		}
		cargarComboUbigeo(data.distrito.provincia.departamento.id, data.distrito.provincia.id, data.distrito.id);
		_modal.modal('show');

		
		
	});
})

// buscar ruc empresa
$('input[name = "ruc"]').on('blur', function(){
	let _doc = $('input[name = "ruc"]').val();
	//alert(_url_web_+'/consulta/persona/existeDocumento');
	//let _tipo = $('select[name = "tipo_documento"]').val();
	$.ajax({
		url: _url_web_+'/consulta/empresa/existeRuc',
		type: 'get',
		dataType: 'json',
		data:{ndocumento:_doc}
	})
	.done(function(data) {
		
		let _modal = $("#modal_cliente");
		let _num_doc = data.ruc;
		_modal.find("#registrar_cliente").attr('action', _url_web_+'/mantenimiento/empresa/'+_doc);
		_modal.find("#registrar_cliente").append('<input type="hidden" name="_method" value="PUT">');
		if(_num_doc){ //PERSONA
			//activarInput();
			_modal.find('input[name="ruc"]').val(data.ruc);
			_modal.find('input[name="razon_social"]').val(data.razon_social);
			_modal.find('input[name="nombre_comercial"]').val(data.nombre);
			_modal.find('input[name="telefono_empresa"]').val(data.telefono);
			_modal.find('input[name="direccionE"]').val(data.direccion);
			_modal.find('input[name="emailE"]').val(data.correo);
		
		}else{ // EMPRESA
			//desactivarInput();
			_modal.find('input[name="ruc"]').val("");
			_modal.find('input[name="razon_social"]').val("");
			_modal.find('input[name="nombre_comercial"]').val("");
			_modal.find('input[name="telefono_empresa"]').val("");
			_modal.find('input[name="direccionE"]').val("");
			_modal.find('input[name="emailE"]').val("");
			
		}
		cargarComboUbigeo(data.distrito.provincia.departamento.id, data.distrito.provincia.id, data.distrito.id);
		_modal.modal('show');
		
	});
})