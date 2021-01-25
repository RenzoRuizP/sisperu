
$("#guardar_paciente").on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar paciente', function(){
		$("#registrar_paciente").submit();
	})
});

$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _nombre = $(this).data('nombre');

	$.ajax({
		url: _url_web_+'/mantenimiento/paciente/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		
		let _modal = $("#modal_paciente");

		_modal.find("#registrar_paciente").attr('action', _url_web_+'/mantenimiento/paciente/'+_id);
		_modal.find("#registrar_paciente").append('<input type="hidden" name="_method" value="PUT">');

		_modal.find('select[name="persona_id"]').val(data.persona_id);
		_modal.modal('show');
	});
	

	
});

$("#modal_paciente").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_paciente")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_paciente").attr('action',_url_web_+'/mantenimiento/paciente'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_paciente").find('input[name="_token"]').val($("#cargo_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_paciente").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});

$(".btn-eliminar").on('click', function(){ // eliminar
	let _id = $(this).data('id');
		$("#paciente_eliminar").attr('action', _url_web_+'/mantenimiento/paciente/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar paciente', function(){

		$("#paciente_eliminar").submit();
	})
})