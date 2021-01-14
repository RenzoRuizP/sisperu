$("#guardar_producto").on('click', function(){
	demo.showSwal('confirm', 'registrar', 'registrar producto', 
		function(){
			$("#registrar_producto").submit();
		})
});

$(".btn-editar").on('click', function(){ // editar
	let _id = $(this).data('id');
	//let _modal = $("#modal_producto");
	//let _nombre = $(this).data('nombre');

	$.ajax({
		url: _url_web_+'/mantenimiento/producto/'+_id+'/edit',
		type: 'get',
		dataType: 'json',
	})
	.done(function(data) {
		//console.log(data);
		let _modal = $("#modal_producto");

		_modal.find("#registrar_producto").attr('action', _url_web_+'/mantenimiento/producto/'+_id);
		_modal.find("#registrar_producto").append('<input type="hidden" name="_method" value="PUT">');

		_modal.find('input[name="codigo"]').val(data.codigo);
		_modal.find('input[name="nombre"]').val(data.nombre);
		_modal.find('input[name="caracteristicas"]').val(data.caracteristicas);
		_modal.find('input[name="categoria_id"]').val(data.categoria_id);
		_modal.find('input[name="marca_id"]').val(data.marca_id);
		_modal.find('input[name="proveedor_id"]').val(data.proveedor_id);
		_modal.find('input[name="foto"]').val(data.foto);
		_modal.find('input[name="unidad_por_base"]').val(data.unidad_por_base);
		_modal.find('input[name="costo_proveedor"]').val(data.costo_proveedor);
		_modal.modal('show');
	});
	
	//console.log(data);
	
})

$("#modal_producto").on('hidden.bs.modal', function(event) {
	$(this).find("#registrar_producto")[0].reset(); // limpiar los elementos del formulario
	$(this).find("#registrar_producto").attr('action',_url_web_+'/mantenimiento/producto'); // para limpiar la ruta del action del formulario
	$(this).find("#registrar_producto").find('input[name="_token"]').val($("#producto_eliminar").find('input[name="_token"]').val()); // recuperar token del formulario laravel

	$(this).find("#registrar_producto").find('input[name="_method"]').remove(); // para eliminar el input method del formulario
});

$(".btn-eliminar").on('click', function(){ // eliminar
	let _id = $(this).data('id');
		$("#producto_eliminar").attr('action', _url_web_+'/mantenimiento/producto/'+_id);
	demo.showSwal('confirm', 'eliminar', 'eliminar producto', function(){

		$("#producto_eliminar").submit();
	})
});
