
$("#guardar_usuario").on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar usuario', function(){
		$("#registrar_usuario").submit();
	})
});

$("#modal_usuario").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_usuario")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_usuario").attr('action',_url_web_+'/mantenimiento/user'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_usuario").find('input[name="_token"]').val($("#usuario_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_usuario").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});

$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _nombre = $(this).data('name');
	//let _p = $(this).data('password')
	$.ajax({
		url: _url_web_+'/mantenimiento/user/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		
		let _modal = $("#modal_usuario");

		_modal.find("#registrar_usuario").attr('action', _url_web_+'/mantenimiento/user/'+_id);
		_modal.find("#registrar_usuario").append('<input type="hidden" name="_method" value="PUT">');

		_modal.find('input[name="name"]').val(data.name);
		_modal.find('input[name="clave"]').val(data.password);
		_modal.find('select[name="trabajador_id"]').val(data.trabajador_id);
		_modal.modal('show');
	});
	

	
})

function buscar_doc(){
	let doc = document.getElementById("numero_documento").value;
}
/*
$(".btn-eliminar").on('click', function() {
	let _id = $(this).data('id');
	$("#usuario_eliminar").attr('action', _url_web_+'/mantenimiento/usuario/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar usuario', function(){
		$("#usuario_eliminar").submit();
	})
});

$("#modal_usuario").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_usuario")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_usuario").attr('action',_url_web_+'/mantenimiento/usuario'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_usuario").find('input[name="_token"]').val($("#usuario_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_usuario").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});
*/