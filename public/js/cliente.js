
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
		_modal.find("#registrar_cliente").attr('action', _url_web_+'/mantenimiento/cliente/'+_id);
		_modal.find("#registrar_cliente").append('<input type="hidden" name="_method" value="PUT">');

		if(_num_doc)
		{
			_modal.find('input[name="ruc"]').val(data.ruc);
			_modal.find('input[name="razon_social"]').val(data.razon_social);
			_modal.find('input[name="nombre_comercial"]').val(data.nombre);
			_modal.find('input[name="telefono_empresa"]').val(data.telefono);
			_modal.find('input[name="direccionE"]').val(data.direccion);
			_modal.find('input[name="emailE"]').val(data.correo);
			
		}else{

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

