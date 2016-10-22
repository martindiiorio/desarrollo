<?php
	require_once("soporte.php");
	if (!$auth->estaLogueado()) {
		header("location:index.php");exit;
	}
	$usuario = $auth->getUsuarioLogueado();
?>
Hola <?php echo $usuario->getNombre() ?> - <a href="logout.php">Logout</a>