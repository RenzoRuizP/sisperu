// REGISTRAR

$("#guardar_marca").on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar marca', 
		function(){
			$("#registrar_marca").submit();
	})
});


//ELININAR

$(".btn-eliminar").on('click', function(){ // eliminar
	let _id = $(this).data('numero_documento');
		$("#marca_eliminar").attr('action', _url_web_+'/mantenimiento/marca/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar marca', function(){

		$("#marca_eliminar").submit();
	})
});

$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _nombre = $(this).data('nombre');

	$.ajax({
		url: _url_web_+'/mantenimiento/marca/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		console.log(data);
		let _modal = $("#modal_marca");

		_modal.find("#registrar_marca").attr('action', _url_web_+'/mantenimiento/marca/'+_id);
		_modal.find("#registrar_marca").append('<input type="hidden" name="_method" value="PUT">');

		_modal.find('input[name="nombre"]').val(data.nombre);
		_modal.find('img#img_preview').attr('src', _storage_+data.imagen);
		_modal.modal('show');
	});
	
	//console.log(data);
	
})

$("#modal_marca").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_marca")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_marca").attr('action',_url_web_+'/mantenimiento/marca'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_marca").find('input[name="_token"]').val($("#marca_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel
	$(this).find('img#img_preview').attr('src', '');
	$(this).find("#registrar_marca").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});
