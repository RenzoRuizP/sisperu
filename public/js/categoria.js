
$("#guardar_categoria").on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar categoria',
		function(){
			$("#registrar_categoria").submit();
		})
})


$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _nombre = $(this).data('nombre');

	$.ajax({
		url: _url_web_+'/mantenimiento/categoria/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		
		let _modal = $("#modal_categoria");

		_modal.find("#registrar_categoria").attr('action', _url_web_+'/mantenimiento/categoria/'+_id);
		_modal.find("#registrar_categoria").append('<input type="hidden" name="_method" value="PUT">');

		_modal.find('input[name="nombre"]').val(data.nombre);
		_modal.find('input[name="padre"]').val(data.padre);
		_modal.modal('show');
	});

	})

$(".btn-eliminar").on('click', function() {
	let _id = $(this).data('id');
	$("#categoria_eliminar").attr('action', _url_web_+'/mantenimiento/categoria/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar categoria', function(){
		$("#categoria_eliminar").submit();
	})
});

$("#modal_categoria").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_categoria")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_categoria").attr('action',_url_web_+'/mantenimiento/categoria'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_categoria").find('input[name="_token"]').val($("#categoria_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_categoria").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});

