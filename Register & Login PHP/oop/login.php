<?php
	require_once("soporte.php");

	if ($auth->estaLogueado())
	{
		header("location:index.php");exit;
	}

	if ($_POST)
	{
		//Sé que llegó acá tras haber enviado el form

		$errores = $validar->validarLogin();

		if (empty($errores))
		{

			// Loguearlo
			$usuario = $repositorio->getUserRepository()->getUsuarioByMail($_POST["mail"]);

			$auth->loguear($usuario);
			
			// Si me puso que lo recuerde, recordarlo
			if (isset($_POST["recordame"])) {
				//recordarlo
				setcookie("usuarioLogueado", $usuario->getId(), time() + 60 * 60 * 24 * 3);
			}

			// Redirigirlo
			header("location:index.php");exit;
		}
	}
?>

<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<h1>Login!</h1>
		<form action="login.php" method="POST">
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
				<label for="mail">Mail:</label>
				<input id="mail" type="text" name="mail"></input>
			</div>
			<div>
				<label for="pass">Contrase&ntilde;a:</label>
				<input id="pass" type="password" name="password"></input>
			</div>
			<div>
				Recordame
				<input type="checkbox" name="recordame"></input>
			</div>
			<div>
				<input id="submit" type="submit" name="submit" value="Enviar"></input>
			</div>
		</form>
	</body>
</html>
