<?php

$nombre = "";
$errores = "";
$pNombre = "";
$pMail = "";

if ($_POST && $_POST["origen"] == "register") {
    $pNombre = $_POST["nombre"];
    $pMail = $_POST["mail"];

    @$errores = $validar->validarUsuario($_POST);

    // nuevo usuario
    if (empty($errores)) {
      $miUsuarioArr = $_POST;
      $usuario = new Usuario($_POST);
      $usuario->setPassword($_POST["password"]);
      // Guardar al usuario en un JSON
      $repositorio->getUserRepository()->guardarUsuario($usuario);
    }
}

?>