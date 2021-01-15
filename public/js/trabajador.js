
$("#guardar_trabajador").on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar trabajador', function(){
		$('#registrar_trabajador').submit();
	})
});

$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _nombre = $(this).data('nombre');

	$.ajax({
		url: _url_web_+'/mantenimiento/trabajador/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		
		let _modal = $("#modal_trabajador");

		_modal.find("#registrar_trabajador").attr('action', _url_web_+'/mantenimiento/trabajador/'+_id);
		_modal.find("#registrar_trabajador").append('<input type="hidden" name="_method" value="PUT">');

		_modal.find('input[name="cargo_id"]').val(data.cargo_id);
		_modal.find('input[name="empresa_id"]').val(data.empresa_id);
		_modal.find('input[name="sucursal_id"]').val(data.sucursal_id);
		_modal.find('input[name="planilla"]').val(data.planilla);
		_modal.find('input[name="horas_trabajo"]').val(data.horas_trabajo);
		_modal.find('input[name="tiempo_refrigerio"]').val(data.tiempo_refrigerio);
		_modal.find('input[name="persona_id"]').val(data.persona_id);
		
		_modal.modal('show');
	});
	

	
})

$(".btn-eliminar").on('click', function() {
	let _id = $(this).data('id');
	$("#trabajador_eliminar").attr('action', _url_web_+'/mantenimiento/trabajador/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar trabajador', function(){
		$("#trabajador_eliminar").submit();
	})
});

$("#modal_proveedor").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_trabajador")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_trabajador").attr('action',_url_web_+'/mantenimiento/trabajador'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_trabajador").find('input[name="_token"]').val($("#trabajador_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_trabajador").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});