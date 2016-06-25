
<!-- cuando carga todo el documento va a cargar el script. -->
<!-- //para hacer que aparesca el modal -->
<script>

	function traer_modal()
	{
		$('form[name=empleado_insert]').trigger("reset");
		$("#msg_empleado").empty();


		$('#myModal').modal('show');
	}
	function guardar_empleados()
	{
		if(empleado_insert.nombre.value == "") {
			$("#msg_empleaod").empty();
			$("#msg_empleado").html("<span class='text-danger'>Campo Obligatorio</span>");
			$("input[name=nombre]").focus(); return false;
		}

		if(empleado_insert.apellido.value==""){
			$("input[name=apellido]").focus(); return false;
		}

		if(empleado_insert.dni.value==""){
			$("input[name=dni]").focus(); return false;
		}

		if(empleado_insert.estado.value==""){
			$("input[name=estado]").focus(); return false;
		}


		$.ajax({
			url: '<?php echo site_url("Empleados_controlador/guardar_empleados"); ?>',
			type: 'post',
			data:$('form[name=empleado_insert]').serialize(),
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
				$("input[name=id_empleado]").val('');
				$('form[name=empleado_insert]').trigger("reset");
				$('#myModal').modal('hide');
			}
		});
	}
	function eliminar_empleados(id_empleado)
	{

		$.post("<?php echo site_url('Empleados_controlador/eliminar_empleados') ?>",{
			id_empleado:id_empleado
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
	function modificar_empleados(id_empleado)
	{
		$.post("<?php echo site_url('Empleados_controlador/traer_empleado') ?>",{
			id_empleado:id_empleado
		},function(data){

			var json=JSON.parse(data);
			$("input[name=id_empleado]").val(json.id_empleado);
			$("input[name=nombre]").val(json.nombre);
			$("input[name=apellido]").val(json.apellido);
			$("input[name=dni]").val(json.dni);
			$("input[name=estado]").val(json.estado);
			$('#myModal').modal('show');
			});

	}
</script>