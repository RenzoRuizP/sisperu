
$("#guardar_institucion").on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar institución', function(){
		$("#registrar_institucion").submit();
	})
});

$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _nombre = $(this).data('nombre');

	$.ajax({
		url: _url_web_+'/mantenimiento/institucion/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		
		let _modal = $("#modal_institucion");

		_modal.find("#registrar_institucion").attr('action', _url_web_+'/mantenimiento/institucion/'+_id);
		_modal.find("#registrar_institucion").append('<input type="hidden" name="_method" value="PUT">');

		_modal.find('select[name="tipo_institucion"]').val(data.tipo_institucion);
		_modal.find('input[name="nombre"]').val(data.nombre);
		_modal.find('input[name="telefono"]').val(data.telefono);
		cargarComboUbigeo(data.distrito.provincia.departamento.id, data.distrito.provincia.id, data.distrito.id);
		_modal.find('input[name="direccion"]').val(data.direccion);
		_modal.find('select[name="empresa_id"]').val(data.empresa_id);
		
		_modal.modal('show');
	});
	

	
});

$(".btn-eliminar").on('click', function() {
	let _id = $(this).data('id');
	$("#institucion_eliminar").attr('action', _url_web_+'/mantenimiento/institucion/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar institucion', function(){
		$("#institucion_eliminar").submit();
	})
});

$("#modal_institucion").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_institucion")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_institucion").attr('action',_url_web_+'/mantenimiento/institucion'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_institucion").find('input[name="_token"]').val($("#institucion_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_institucion").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});
