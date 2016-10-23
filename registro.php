<?php

  require_once("rl/soporte.php");

	$nombre = "";

	if ($auth->estaLogueado())
	{
		$user = $auth->getUsuarioLogueado();

		$nombre = $user->getNombre();
	}

  $pNombre = "";
  $pMail = "";

  if ($_POST)
  {
    $pNombre = $_POST["nombre"];
    $pMail = $_POST["email"];
    //Acá vengo si me enviaron el form

    //Validar
    $errores = $validar->validarUsuario($_POST);

    // Si no hay errores....
    if (empty($errores))
    {
      $miUsuarioArr = $_POST;
      $usuario = new Usuario($_POST);
      $usuario->setPassword($_POST["pass1"]);
      // Guardar al usuario en un JSON
      $repositorio->getUserRepository()->guardarUsuario($usuario);
      // Reenviarlo a la felicidad
      header("location:index.php");exit;
    }
  }

?>
