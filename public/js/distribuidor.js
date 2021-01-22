$("#guardar_distribuidor").on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar distribuidor', function(){
		$("#registrar_distribuidor").submit();
	});
});

$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _nombre = $(this).data('nombre');

	$.ajax({
		url: _url_web_+'/mantenimiento/distribuidor/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		
		let _modal = $("#modal_distribuidor");

		_modal.find("#registrar_distribuidor").attr('action', _url_web_+'/mantenimiento/distribuidor/'+_id);
		_modal.find("#registrar_distribuidor").append('<input type="hidden" name="_method" value="PUT">');

		_modal.find('select[name="tipo"]').val(data.tipo);
		_modal.find('select[name="empresa_id"]').val(data.empresa_id);
		
		_modal.modal('show');
	});
	

	
});

$("#modal_distribuidor").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_distribuidor")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_distribuidor").attr('action',_url_web_+'/mantenimiento/distribuidor'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_distribuidor").find('input[name="_token"]').val($("#distribuidor_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_distribuidor").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});

$(".btn-eliminar").on('click', function() {
	let _id = $(this).data('id');
	$("#distribuidor_eliminar").attr('action', _url_web_+'/mantenimiento/distribuidor/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar distribuidor', function(){
		$("#distribuidor_eliminar").submit();
	})
});