
$("#guardar_sucursal").on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar sucursal', function(){
		$('#registrar_sucursal').submit();
	})
});


$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _nombre = $(this).data('nombre');

	$.ajax({
		url: _url_web_+'/mantenimiento/sucursal/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		console.log(data);
		let _modal = $("#modal_sucursal");

		_modal.find("#registrar_sucursal").attr('action', _url_web_+'/mantenimiento/sucursal/'+_id);
		_modal.find("#registrar_sucursal").append('<input type="hidden" name="_method" value="PUT">');

		_modal.find('input[name="cargo_id"]').val(data.cargo_id);
		_modal.find('input[name="nombre"]').val(data.nombre);
		cargarComboUbigeo(data.distrito.provincia.departamento.id, data.distrito.provincia.id, data.distrito.id);
		//_modal.find('input[name="distrito_id"]').val(data.distrito_id);
		_modal.find('input[name="direccion"]').val(data.direccion);
		_modal.find('input[name="telefono"]').val(data.telefono);
		_modal.find('input[name="tipo_sucursal"]').val(data.tipo_sucursal);
		
		_modal.modal('show');
	});
	

	
})

$(".btn-eliminar").on('click', function() {
	let _id = $(this).data('id');
	$("#sucursal_eliminar").attr('action', _url_web_+'/mantenimiento/sucursal/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar sucursal', function(){
		$("#sucursal_eliminar").submit();
	})
});

$("#modal_sucursal").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_sucursal")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_sucursal").attr('action',_url_web_+'/mantenimiento/sucursal'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_sucursal").find('input[name="_token"]').val($("#sucursal_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_sucursal").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});

