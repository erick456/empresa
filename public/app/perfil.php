
<!-- cuando carga todo el documento va a cargar el script. -->
<!-- //para hacer que aparesca el modal -->
<script>

	function traer_modal()
	{
		$('form[name=perfil_insert]').trigger("reset");
		$("#msg_perfil").empty();


		$('#myModal').modal('show');
	}
	function guardar_perfil()
	{
		if(perfil_insert.descripcion.value == "") {
			$("#msg_perfil").empty();
			$("#msg_perfil").html("<span class='text-danger'>Campo Obligatorio</span>");
			$("input[name=descripcion]").focus(); return false;
		}
		if(perfil_insert.estado.value==""){
			$("input[name=estado]").focus(); return false;
		}


		$.ajax({
			url: '<?php echo site_url("Perfil_controlador/guardar_perfil"); ?>',
			type: 'post',
			data:$('form[name=perfil_insert]').serialize(),
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
					    message: 'Exitosamente guardado.',
					    type: 'error',
					    showCloseButton: true
					});
				}else{
					alert("Error al insertar");
				}
				//para resetear el formulario
				$("input[name=id_perfil]").val('');
				$('form[name=perfil_insert]').trigger("reset");
				$('#myModal').modal('hide');
			}
		});
	}
	function eliminar_perfil(id_perfil)
	{

		$.post("<?php echo site_url('Perfil_controlador/eliminar_perfil') ?>",{
			id_perfil:id_perfil
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
	function modificar_perfil(id_perfil)
	{
		$.post("<?php echo site_url('Perfil_controlador/traer_perfil') ?>",{
			id_perfil:id_perfil
		},function(data){

			var json=JSON.parse(data);
			$("input[name=id_perfil]").val(json.id_perfil);
			$("input[name=descripcion]").val(json.descripcion);
			$("input[name=estado]").val(json.estado);
			$('#myModal').modal('show');
			});

	}
</script>