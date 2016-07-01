
<!-- cuando carga todo el documento va a cargar el script. -->
<!-- //para hacer que aparesca el modal -->
<script>

	function traer_modal()
	{
		$('form[name=producto_insert]').trigger("reset");
		$("#msg_producto").empty();


		$('#myModal').modal('show');
	}
	function guardar_producto()
	{
		if(producto_insert.producto.value == "") {
			$("#msg_producto").empty();
			$("#msg_producto").html("<span class='text-danger'>Campo Obligatorio</span>");
			$("input[name=producto]").focus(); return false;
		}
		if(producto_insert.descripcion.value==""){
			$("input[name=descripcion]").focus(); return false;
		}
		if(producto_insert.precio.value==""){
			$("input[name=precio]").focus(); return false;
		}
		if(producto_insert.numeroexistente.value==""){
			$("input[name=numeroexistente]").focus(); return false;
		}

		$.ajax({
			url: '<?php echo site_url("Producto_controlador/guardar_producto"); ?>',
			type: 'post',
			data:$('form[name=producto_insert]').serialize(),
			success: function (data) {
				//el split devuelve un array en el que la posicion 1 son los productos listados y
				// la posicion 0 es la respuesta de la insercion de los datos
				$info = data.split("|");
				if($info[0] == "1") {
					//limpiamos el cuerpo de la tabla
					$("#informacion").empty();
					//agregamos los nuevos productos listados
					$("#informacion").html($info[1]);
				}else{
					alert("Error al insertar");
				}
				//para resetear el formulario
				$("input[name=id]").val('');
				$('form[name=producto_insert]').trigger("reset");
				$('#myModal').modal('hide');
			}
		});
	}
	function eliminar_producto(id)
	{

		$.post("<?php echo site_url('Producto_controlador/eliminar_producto') ?>",{
			id:id
		},function(data){
			$info = data.split("|");
			if($info[0] == "1") {
					//limpiamos el cuerpo de la tabla
					$("#informacion").empty();
					//agregamos los nuevos productos listados
					$("#informacion").html($info[1]);
				}else{
					alert("Error al eliminar");
				}
			});
	}
	function modificar_producto(id)
	{
		$.post("<?php echo site_url('Producto_controlador/traer_producto') ?>",{
			id:id
		},function(data){

			var json=JSON.parse(data);
			$("input[name=id]").val(json.id);
			$("input[name=producto]").val(json.producto);
			$("input[name=descripcion]").val(json.descripcion);
			$("input[name=precio]").val(json.precio);
			$("input[name=numeroexistente]").val(json.numeroexistente);
			$('#myModal').modal('show');
			});

	}
</script>