
<!-- cuando carga todo el documento va a cargar el script. -->
<!-- //para hacer que aparesca el modal -->
<script>

	function traer_modal()
	{
		$('form[name=cliente_insert]').trigger("reset");
		$("#msg_cliente").empty();


		$('#myModal').modal('show');
	}
	function guardar_cliente()
	{
		if(cliente_insert.nombre.value == "") {
			$("#msg_cliente").empty();
			$("#msg_cliente").html("<span class='text-danger'>Campo Obligatorio</span>");
			$("input[name=nombre]").focus(); return false;
		}
		if(cliente_insert.apellido.value==""){
			$("input[name=apellido]").focus(); return false;
		}
		if(cliente_insert.telefono.value==""){
			$("input[name=telefono]").focus(); return false;
		}

		$.ajax({
			url: '<?php echo site_url("Cliente_controlador/guardar_cliente"); ?>',
			type: 'post',
			data:$('form[name=cliente_insert]').serialize(),
			success: function (data) {
				//el split devuelve un array en el que la posicion 1 son los productos listados y
				// la posicion 0 es la respuesta de la insercion de los datos
				$info = data.split("|");
				if($info[0] == "1") {
					//limpiamos el cuerpo de la tabla
					$("#informacion").empty();
					//agregamos los nuevos productos listados
					$("#informacion").html($info[1]);
					Messenger().post({
					    message: 'There was an explosion while processing your request.',
					    type: 'error',
					    showCloseButton: true
					});
				}else{
					alert("Error al insertar");
				}
				//para resetear el formulario
				$("input[name=id]").val('');
				$('form[name=cliente_insert]').trigger("reset");
				$('#myModal').modal('hide');
			}
		});
	}
	function eliminar_cliente(id_cliente)
	{

		$.post("<?php echo site_url('Cliente_controlador/eliminar_cliente') ?>",{
			id_cliente:id_cliente
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
	function modificar_cliente(id_cliente)
	{
		$.post("<?php echo site_url('Cliente_controlador/traer_cliente') ?>",{
			id_cliente:id_cliente
		},function(data){

			var json=JSON.parse(data);
			$("input[name=id_cliente]").val(json.id_cliente);
			$("input[name=nombre]").val(json.nombre);
			$("input[name=apellido]").val(json.apellido);
			$("input[name=telefono]").val(json.telefono);
			$('#myModal').modal('show');
			});

	}
</script>