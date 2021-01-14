

$("#guardar_proveedor").on('click', function(){ // registrar

	demo.showSwal('confirm', 'registrar', 'registrar proveedor', function(){

		$("#registrar_proveedor").submit();
	})

});

$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _nombre = $(this).data('nombre');

	$.ajax({
		url: _url_web_+'/mantenimiento/proveedor/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		
		let _modal = $("#modal_proveedor");

		_modal.find("#registrar_proveedor").attr('action', _url_web_+'/mantenimiento/proveedor/'+_id);
		_modal.find("#registrar_proveedor").append('<input type="hidden" name="_method" value="PUT">');

		_modal.find('input[name="nombre"]').val(data.nombre);
		_modal.find('input[name="telefono"]').val(data.telefono);
		_modal.find('input[name="correo"]').val(data.correo);
		_modal.modal('show');
	});

	})

$(".btn-eliminar").on('click', function() {
	let _id = $(this).data('id');
	$("#proveedor_eliminar").attr('action', _url_web_+'/mantenimiento/proveedor/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar proveedor', function(){
		$("#proveedor_eliminar").submit();
	})
});

$("#modal_proveedor").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_proveedor")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_proveedor").attr('action',_url_web_+'/mantenimiento/proveedor'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_proveedor").find('input[name="_token"]').val($("#proveedor_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_proveedor").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});