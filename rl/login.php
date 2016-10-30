<?php

if ($_POST && @$_POST["origen"] == "login") {
    $errores = $validar->validarLogin();
    if (empty($errores)) {
        $usuario = $repositorio->getUserRepository()->getUsuarioByMail($_POST["usrnameLogin"]);
        $auth->loguear($usuario);
        if (isset($_POST["recordame"])) {
            setcookie("usuarioLogueado", $usuario->getId(), time() + 60 * 60 * 24 * 3);
            header("location:index.php"); exit;
        }
    }
}

?>
