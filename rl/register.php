<?php

$nombre = "";
$errores = "";
$pNombre = "";
$pMail = "";

if ($_POST && $_POST["origen"] == "register") {
    $pNombre = $_POST["nombre"];
    $pMail = $_POST["email"];

    $errores = $validar->validarUsuario($_POST);
    // nuevo usuario
    if (empty($errores)) {
      $usuario = new Usuario($_POST);
      $usuario->setPassword($_POST["password"]);
      // Guardar al usuario
      $repositorio->getUserRepository()->guardarUsuario($usuario);
      $auth->loguear($usuario);
    }
}

?>
