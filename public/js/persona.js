
$("#guardar_persona").on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar persona', function(){
		$('#registrar_persona').submit();
	})
});

$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _nombre = $(this).data('nombre');

	$.ajax({
		url: _url_web_+'/mantenimiento/persona/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		
		let _modal = $("#modal_persona");

		_modal.find("#registrar_persona").attr('action', _url_web_+'/mantenimiento/persona/'+_id);
		_modal.find("#registrar_persona").append('<input type="hidden" name="_method" value="PUT">');

		_modal.find('input[name="nombres"]').val(data.nombres);
		_modal.find('input[name="apellidos"]').val(data.apellidos);
		_modal.find('input[name="fecha_nacimiento"]').val(data.fecha_nacimiento);
		_modal.find('input[name="telefono"]').val(data.telefono);
		_modal.find('input[name="email"]').val(data.email);
		_modal.find('select[name="estado_civil"]').val(data.estado_civil);
		_modal.find('input[name="edad"]').val(data.edad);
		_modal.find('input[name="profesion"]').val(data.profesion);
		cargarComboUbigeo(data.distrito.provincia.departamento.id, data.distrito.provincia.id, data.distrito.id);
		_modal.find('input[name="direccion"]').val(data.direccion);
		_modal.find('select[name="tipo_documento"]').val(data.tipo_documento);
		_modal.find('input[name="numero_documento"]').val(data.numero_documento);
		_modal.find('select[name="sexo"]').val(data.sexo);
		
		_modal.modal('show');
	});
	

	
})

$(".btn-eliminar").on('click', function() {
	let _id = $(this).data('id');
	$("#persona_eliminar").attr('action', _url_web_+'/mantenimiento/persona/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar persona', function(){
		$("#persona_eliminar").submit();
	})
});

$("#modal_persona").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_persona")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_persona").attr('action',_url_web_+'/mantenimiento/persona'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_persona").find('input[name="_token"]').val($("#persona_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_persona").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});

