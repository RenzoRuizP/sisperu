
$("#guardar_cargo").on('click', function(){ // registrar

	demo.showSwal('confirm', 'registrar', 'registrar cargo', function(){

		$("#registrar_cargo").submit();
	})

})

$(".btn-eliminar").on('click', function(){ // eliminar
	let _id = $(this).data('id');
		$("#cargo_eliminar").attr('action', _url_web_+'/mantenimiento/cargo/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar cargo', function(){

		$("#cargo_eliminar").submit();
	})
})

$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _nombre = $(this).data('nombre');

	$.ajax({
		url: _url_web_+'/mantenimiento/cargo/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		
		let _modal = $("#modal_cargo");

		_modal.find("#registrar_cargo").attr('action', _url_web_+'/mantenimiento/cargo/'+_id);
		_modal.find("#registrar_cargo").append('<input type="hidden" name="_method" value="PUT">');

		_modal.find('input[name="nombre"]').val(data.nombre);
		_modal.modal('show');
	});
	

	
})

$("#modal_cargo").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_cargo")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_cargo").attr('action',_url_web_+'/mantenimiento/cargo'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_cargo").find('input[name="_token"]').val($("#cargo_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_cargo").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});