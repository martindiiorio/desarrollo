<?php
	require_once("soporte.php");

	if ($auth->estaLogueado())
	{
		header("location:index.php");exit;
	}

	$pNombre = "";
	$pApellido = "";
	$pMail = "";

	$sexos = ["Masculino", "Femenino", "Otro"];

	if ($_POST)
	{
		$pNombre = $_POST["nombre"];
		$pApellido = $_POST["apellido"];
		$pMail = $_POST["mail"];
		//Acá vengo si me enviaron el form

		//Validar
		$errores = $validar->validarUsuario($_POST);

		// Si no hay errores....
		if (empty($errores))
		{
			$miUsuarioArr = $_POST;
			$usuario = new Usuario($_POST);
			$usuario->setPassword($_POST["password"]);
			// Guardar al usuario en un JSON
			$repositorio->getUserRepository()->guardarUsuario($usuario);
			$usuario->guardarImagen($usuario);
			// Reenviarlo a la felicidad
			header("location:index.php");exit;
		}
	}
?>

<html>
	<head>
		<title>Registracion</title>
	</head>
	<body>
		<h1>Registrate!</h1>
		<form action="register.php" method="POST" enctype="multipart/form-data">
			<?php if (!empty($errores)) { ?>
				<div style="width:300px;background-color:red">
					<ul>
						<?php foreach ($errores as $error) { ?>
							<li>
								<?php echo $error ?>
							</li>
						<?php } ?>
					</ul>
				</div>
			<?php } ?>
			<div>
				<label for="nombre">Nombre:</label>
				<input id="nombre" type="text" name="nombre" value="<?php echo $pNombre ?>"></input>
			</div>
			<div>
				<label for="apellido">Apellido:</label>
				<input id="apellido" type="text" name="apellido" value="<?php echo $pApellido ?>"></input>
			</div>
			<div>
				<label for="mail">Mail:</label>
				<input id="mail" type="text" name="mail" value="<?php echo $pMail ?>"></input>
			</div>
			<div>
				<label for="pass">Contrase&ntilde;a:</label>
				<input id="pass" type="password" name="password"></input>
			</div>
			<div>
				<label for="cpass">Confirmar Contrase&ntilde;a:</label>
				<input id="cpass" type="password" name="cpass"></input>
			</div>
			<div>
				<label for="sexo">Sexo:</label>
				<select name="sexo" id="sexo">
					<?php foreach ($sexos as $key => $sexo) { ?>
						<?php if (isset($_POST["sexo"]) && $key == $_POST["sexo"]) { ?>
							<option selected value="<?php echo $key?>"><?php echo $sexo?></option>
						<?php } else { ?>
							<option value="<?php echo $key?>"><?php echo $sexo?></option>
						<?php } ?>
					<?php } ?>
				</select>
			</div>
			<div>
				<label for="imagen">Avatar:</label>
				<input id="imagen" name="imagen" type="file"/>
			</div>
			<div>
				<input id="submit" type="submit" name="submit" value="Enviar"></input>
			</div>
		</form>
	</body>
</html>
