$("#guardar_empresa").on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar empresa', function(){
		$('#registrar_empresa').submit();
	})
});

$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	
	$.ajax({
		url: _url_web_+'/mantenimiento/empresa/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		
		let _modal = $("#modal_empresa");

		_modal.find("#registrar_empresa").attr('action', _url_web_+'/mantenimiento/empresa/'+_id);
		_modal.find("#registrar_empresa").append('<input type="hidden" name="_method" value="PUT">');

		_modal.find('input[name="nombre"]').val(data.nombre);
		_modal.find('input[name="razon_social"]').val(data.razon_social);
		//_modal.find('input[name="distrito_id"]').val(data.distrito_id);
		cargarComboUbigeo(data.distrito.provincia.departamento.id, data.distrito.provincia.id, data.distrito.id);
		_modal.find('input[name="direccion"]').val(data.direccion);
		_modal.find('input[name="ruc"]').val(data.ruc);
		_modal.find('input[name="telefono"]').val(data.telefono);
		_modal.find('input[name="correo"]').val(data.correo);
		
		_modal.modal('show');
	});
	

	
})

$(".btn-eliminar").on('click', function() {
	let _id = $(this).data('id');
	$("#empresa_eliminar").attr('action', _url_web_+'/mantenimiento/empresa/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar empresa', function(){
		$("#empresa_eliminar").submit();
	})
});

$("#modal_proveedor").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_empresa")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_empresa").attr('action',_url_web_+'/mantenimiento/empresa'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_empresa").find('input[name="_token"]').val($("#empresa_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_empresa").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});