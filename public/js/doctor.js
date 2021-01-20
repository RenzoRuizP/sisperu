$('#guardar_doctor').on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar doctor', function(){
		$('#registrar_doctor').submit();
	})
});

$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _nombre = $(this).data('nombre');

	$.ajax({
		url: _url_web_+'/mantenimiento/doctor/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		
		let _modal = $("#modal_doctor");
		
		_modal.find("#registrar_doctor").attr('action', _url_web_+'/mantenimiento/doctor/'+_id);
		_modal.find("#registrar_doctor").append('<input type="hidden" name="_method" value="PUT">');
		_modal.find('input[name="especialidad"]').val(data.especialidad);
		_modal.find('input[name="cmp"]').val(data.cmp);
		_modal.modal('show');
	});

});

$("#modal_doctor").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_doctor")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_doctor").attr('action',_url_web_+'/mantenimiento/doctor'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_doctor").find('input[name="_token"]').val($("#doctor_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_doctor").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});

$(".btn-eliminar").on('click', function(){
	let _id = $(this).data('id');//capturamos el id de la fila en la que vamos a eliminar
	$("#doctor_eliminar").attr('action',_url_web_+'/mantenimiento/doctor/'+_id); // agrupamos la ruta con el id del registro que vamos a eliinar
	demo.showSwal("confirm", "registrar", "registrar doctor", function(){// llamamos al Sweet Alert
		$("#doctor_eliminar").submit();// envíamos formulario
	})

	
});

