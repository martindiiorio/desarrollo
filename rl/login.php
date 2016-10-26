<?php

if ($_POST && @$_POST["origen"] == "login") {
    $errores = $validar->validarLogin();

    if (empty($errores)) {

        // Loguearlo
        $usuario = $repositorio->getUserRepository()->getUsuarioByMail($_POST["usrnameLogin"]);

        $auth->loguear($usuario);

        // Si me puso que lo recuerde, recordarlo
        if (isset($_POST["recordame"])) {
            //recordarlo
            setcookie("usuarioLogueado", $usuario->getId(), time() + 60 * 60 * 24 * 3);
            //header("location:index.php"); exit;
        }
    }
}

?>