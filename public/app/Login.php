<script >

	function ingresar()
	{
		if(login.usuario.value == "") {
			$("#msg_login").empty();
			$("#msg_login").html("<span class='text-danger'>Campo Obligatorio</span>");
			$("input[name=usuario]").focus(); return false;
		}
		if(login.contraseña.value==""){
			$("input[name=contraseña]").focus(); return false;
		}
		$.ajax({
			url: '<?php echo site_url("Login_controlador/ingresar"); ?>',
			type: 'post',
			data:$('form[name=login]').serialize(),
			success: function (data) {
				//el split devuelve un array en el que la posicion 1 son los productos listados y
				// la posicion 0 es la respuesta de la insercion de los datos
				if(data ==0){
					alert("Usuario o contraseña incorrectas");
					$("#msg_login").empty();
				}else
				{
					window.location="<?php echo site_url('Producto_controlador') ?>"; // redirecciona al la pagina principal
				}
			}
		});
	}
</script>>