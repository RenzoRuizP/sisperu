$("#guardar_anamnesis").on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar anamnesis', function(){
		$("#registrar_anamnesis").submit();
	})
});

$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _nombre = $(this).data('nombre');

	$.ajax({
		url: _url_web_+'/mantenimiento/anamnesis/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		
		let _modal = $("#modal_anamnesis");

		_modal.find("#registrar_anamnesis").attr('action', _url_web_+'/mantenimiento/anamnesis/'+_id);
		_modal.find("#registrar_anamnesis").append('<input type="hidden" name="_method" value="PUT">');

		_modal.find('input[name="fecha"]').val(data.fecha);
		_modal.find('select[name="usuario_id"]').val(data.usuario_id);
		_modal.find('select[name="paciente_id"]').val(data.paciente_id);
		_modal.modal('show');
	});
	

	
});

$("#modal_anamnesis").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_anamnesis")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_anamnesis").attr('action',_url_web_+'/mantenimiento/anamnesis'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_anamnesis").find('input[name="_token"]').val($("#anamnesis_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_anamnesis").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});

$(".btn-eliminar").on('click', function(){ // eliminar
	let _id = $(this).data('id');
		$("#anamnesis_eliminar").attr('action', _url_web_+'/mantenimiento/anamnesis/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar anamnesis', function(){

		$("#anamnesis_eliminar").submit();
	})
})