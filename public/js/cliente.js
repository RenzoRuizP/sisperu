
$("#guardar_cliente").on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar cliente', function(){
		$('#registrar_cliente').submit();
	})
});

$("#guardar_empresa").on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar empresa', function(){
		$('#registrar_empresa').submit();
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
		
		let _modal = $("#modal_cliente");
		let _num_doc = data.ruc;
		if(_num_doc)
		{
			_modal.find("#registrar_empresa").attr('action', _url_web_+'/mantenimiento/cliente/'+_id);
			_modal.find("#registrar_empresa").append('<input type="hidden" name="_method" value="PUT">');

			_modal.find('input[name="ruc"]').val(data.ruc);
			_modal.find('input[name="razon_social"]').val(data.razon_social);
			_modal.find('input[name="nombre_comercial"]').val(data.nombre);
			_modal.find('input[name="telefono_empresa"]').val(data.telefono);
			_modal.find('input[name="direccionE"]').val(data.direccion);
			_modal.find('input[name="emailE"]').val(data.correo);

		}else{
			_modal.find("#registrar_cliente").attr('action', _url_web_+'/mantenimiento/cliente/'+_id);
			_modal.find("#registrar_cliente").append('<input type="hidden" name="_method" value="PUT">');	

			_modal.find('select[name="tipo_documento"]').val(data.tipo_documento);
			_modal.find('input[name="doc_id"]').val(data.numero_documento);
			_modal.find('input[name="apellidos"]').val(data.apellidos);
			_modal.find('input[name="nombres"]').val(data.nombres);
			_modal.find('input[name="f_nacimiento"]').val(data.fecha_nacimiento);
			_modal.find('input[name="celular"]').val(data.telefono);
			_modal.find('input[name="email"]').val(data.email);
			_modal.find('select[name="sexo"]').val(data.sexo);
			_modal.find('input[name="direccion"]').val(data.direccion);
		}
		
		
		
		cargarComboUbigeo(data.distrito.provincia.departamento.id, data.distrito.provincia.id, data.distrito.id);
		_modal.modal('show');
	});
	

	
});

$("#modal_cliente").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_cliente")[0].reset(); // limpiar los elementos del formulario cliente persona
	$(this).find("#registrar_empresa")[0].reset(); // limpiar los elementos del formulario cliente empresa

	$(this).find("#registrar_cliente").attr('action',_url_web_+'/mantenimiento/cliente'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_cliente").find('input[name="_token"]').val($("#cliente_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_cliente").find('input[name="_method"]').remove(); // para eliminar el input method del formulario


	$(this).find("#registrar_empresa").attr('action',_url_web_+'/mantenimiento/cliente'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_empresa").find('input[name="_token"]').val($("#cliente_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_empresa").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});


$(".btn-eliminar").on('click', function() {
	let _id = $(this).data('id');
	$("#cliente_eliminar").attr('action', _url_web_+'/mantenimiento/cliente/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar cliente', function(){
		$("#cliente_eliminar").submit();
	})
});


// MOSTRAR DATOS POR MEDIO DE DOCUMENTO PERSONA O EMPRESA

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
		//_modal.find("#registrar_cliente").attr('action', _url_web_+'/mantenimiento/cliente/'+_doc);
		//_modal.find("#registrar_cliente").append('<input type="hidden" name="_method" value="PUT">');
		if(_num_doc){ //PERSONA
			//activarInput();
			_modal.find('input[name="apellidos"]').val(data.apellidos);
			_modal.find('input[name="nombres"]').val(data.nombres);
			_modal.find('input[name="f_nacimiento"]').val(data.fecha_nacimiento);
			_modal.find('input[name="celular"]').val(data.telefono);
			_modal.find('input[name="email"]').val(data.email);
			_modal.find('input[name="direccion"]').val(data.direccion);
			_modal.find('select[name="sexo"]').val(data.sexo);
		
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
});


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
		//_modal.find("#registrar_cliente").attr('action', _url_web_+'/mantenimiento/empresa/'+_doc);
		//_modal.find("#registrar_cliente").append('<input type="hidden" name="_method" value="PUT">');
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
