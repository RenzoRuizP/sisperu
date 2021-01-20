
$(document).ready(function(){

	activarInput();

});


function activarInput(){
	$('#nombres').attr( "disabled", true );
	$('#apellidos').attr( "disabled", true );

	$('#f_nacimiento').attr( "disabled", true );
	$('#celular').attr( "disabled", true );

	$('#email').attr( "disabled", true );
	$('#direccion').attr( "disabled", true );

	$('#p_departamento').attr( "disabled", true );
	$('#p_provincia').attr( "disabled", true );
	$('#p_distrio').attr( "disabled", true );

}

function desactivarInput(){
	$('#nombres').attr( "disabled", false );
	$('#apellidos').attr( "disabled", false );

	$('#f_nacimiento').attr( "disabled", false );
	$('#celular').attr( "disabled", false );

	$('#email').attr( "disabled", false );
	$('#direccion').attr( "disabled", false );

	$('#p_departamento').attr( "disabled", false );
	$('#p_provincia').attr( "disabled", false );
	$('#p_distrio').attr( "disabled", false );
}


$("#guardar_cliente").on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar cliente', function(){
		$('#registrar_cliente').submit();
	})
});

$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _nombre = $(this).data('nombre');

	$.ajax({
		url: _url_web_+'/mantenimiento/cliente/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		//activarInput();
		let _modal = $("#modal_cliente");
		
		_modal.find("#registrar_cliente").attr('action', _url_web_+'/mantenimiento/cliente/'+_id);
		_modal.find("#registrar_cliente").append('<input type="hidden" name="_method" value="PUT">');

		_modal.find('select[name="cargo_id"]').val(data.cargo_id);
		_modal.find('select[name="empresa_id"]').val(data.empresa_id);
		_modal.find('select[name="sucursal_id"]').val(data.sucursal_id);
		_modal.find('input[name="planilla"]').val(data.planilla);
		_modal.find('input[name="sueldo"]').val(data.sueldo);
		_modal.find('input[name="horas_trabajo"]').val(data.horas_trabajo);
		_modal.find('input[name="tiempo_refrigerio"]').val(data.tiempo_refrigerio);
		_modal.find('input[name="persona_id"]').val(data.persona_id);
		
		_modal.modal('show');
	});
	//desactivarInput();

	
})

$(".btn-eliminar").on('click', function() {
	let _id = $(this).data('id');
	$("#cliente_eliminar").attr('action', _url_web_+'/mantenimiento/cliente/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar cliente', function(){
		$("#cliente_eliminar").submit();
	})
});

$("#modal_cliente").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_cliente")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_cliente").attr('action',_url_web_+'/mantenimiento/cliente'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_cliente").find('input[name="_token"]').val($("#clienteeliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_cliente").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});
// buscar documento
$('input[name = "doc_id"]').on('blur', function(){
	let _doc = $('input[name = "doc_id"]').val();
	//alert(_url_web_+'/consulta/persona/existeDocumento');
	let _tipo = $('select[name = "tipo_documento"]').val();
	$.ajax({
		url: _url_web_+'/consulta/persona/existeDocumento',
		type: 'get',
		dataType: 'json',
		data:{tdocumento:_tipo,ndocumento:_doc}
	})
	.done(function(data) {
		
		let _modal = $("#modal_cliente");
		let _num_doc = data.original.numero_documento;
		_modal.find("#registrar_cliente").attr('action', _url_web_+'/mantenimiento/cliente/'+_doc);
		_modal.find("#registrar_cliente").append('<input type="hidden" name="_method" value="PUT">');
		if(_num_doc){
			activarInput();
			_modal.find('input[name="apellidos"]').val(data.original.apellidos);
			_modal.find('input[name="nombres"]').val(data.original.nombres);
			_modal.find('input[name="f_nacimiento"]').val(data.original.fecha_nacimiento);
			_modal.find('input[name="celular"]').val(data.original.telefono);
			_modal.find('input[name="email"]').val(data.original.email);
			_modal.find('input[name="direccion"]').val(data.original.direccion);
			
			_modal.modal('show');
		}else{
			desactivarInput();
			_modal.find('input[name="apellidos"]').val("");
			_modal.find('input[name="nombres"]').val("");
			_modal.find('input[name="f_nacimiento"]').val("");
			_modal.find('input[name="celular"]').val("");
			_modal.find('input[name="email"]').val("");
			_modal.find('input[name="direccion"]').val("");
			
			_modal.modal('show');
		}
		
	});
})