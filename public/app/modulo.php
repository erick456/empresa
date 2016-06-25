
<!-- cuando carga todo el documento va a cargar el script. -->
<!-- //para hacer que aparesca el modal -->
<script>

	function traer_modal()
	{
		$('form[name=modulo_insert]').trigger("reset");
		$("#msg_modulo").empty();


		$('#myModal').modal('show');
	}
	function guardar_modulo()
	{
		if(modulo_insert.nombre.value == "") {
			$("#msg_modulo").empty();
			$("#msg_modulo").html("<span class='text-danger'>Campo Obligatorio</span>");
			$("input[name=nombre]").focus(); return false;
		}


		$.ajax({
			url: '<?php echo site_url("Modulos_controlador/guardar_modulo"); ?>',
			type: 'post',
			data:$('form[name=modulo_insert]').serialize(),
			success: function (data) {

				$info = data.split("|");
				if($info[0] == "1") {
					//limpiamos el cuerpo de la tabla
					$("#informacion").empty();
					//agregamos los nuevos productos listados
					$("#informacion").html($info[1]);
					Messenger().post({
					    message: 'Exitosamente guardado.',
					    type: 'error',
					    showCloseButton: true
					});
				}else{
					alert("Error al insertar");
				}
				//para resetear el formulario
				$("input[name=id_modulo]").val('');
				$('form[name=modulo_insert]').trigger("reset");
				$('#myModal').modal('hide');
			}
		});
	}
	function eliminar_modulo(id_modulo)
	{

		$.post("<?php echo site_url('Modulos_controlador/eliminar_modulo') ?>",{
			id_modulo:id_modulo
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
	function modificar_modulo(id_modulo)
	{
		$.post("<?php echo site_url('Modulos_controlador/traer_modulo') ?>",{
			id_modulo:id_modulo
		},function(data){

			var json=JSON.parse(data);
			$("input[name=id_modulo]").val(json.id_modulo);
			$("input[name=descripcion]").val(json.descripcion);
			$("input[name=estado]").val(json.estado);
			$('#myModal').modal('show');
			});

	}
</script>