$("#guardar_detalle_anamnesis").on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar detalle anamnesis', function(){
		$("#registrar_detalle_anamnesis").submit();
	})
});

$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _nombre = $(this).data('nombre');

	$.ajax({
		url: _url_web_+'/mantenimiento/detalleanamnesis/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		
		let _modal = $("#modal_detalle_anamnesis");

		_modal.find("#registrar_detalle_anamnesis").attr('action', _url_web_+'/mantenimiento/detalleanamnesis/'+_id);
		_modal.find("#registrar_detalle_anamnesis").append('<input type="hidden" name="_method" value="PUT">');

		_modal.find('select[name="anamnesis_id"]').val(data.anamnesis_id);
		_modal.find('input[name="nombreCampo"]').val(data.nombreCampo);
		_modal.find('input[name="valor"]').val(data.valor);
		_modal.modal('show');
	});
	

	
});

$("#modal_detalle_anamnesis").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_detalle_anamnesis")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_detalle_anamnesis").attr('action',_url_web_+'/mantenimiento/detalleanamnesis'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_detalle_anamnesis").find('input[name="_token"]').val($("#detalle_anamnesis_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_detalle_anamnesis").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});

$(".btn-eliminar").on('click', function(){ // eliminar
	let _id = $(this).data('id');
		$("#detalle_anamnesis_eliminar").attr('action', _url_web_+'/mantenimiento/detalleanamnesis/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar detalle anamnesis', function(){

		$("#detalle_anamnesis_eliminar").submit();
	})
})