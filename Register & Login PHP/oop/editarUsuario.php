<?php
	require_once("soporte.php");

	if (!$auth->estaLogueado())
	{
		header("location:index.php");exit;
	}
	if (!isset($_GET["idUser"]))
	{
		header("location:index.php");exit;
	}
	$usuarioLogueado = $auth->getUsuarioLogueado();

	if ($usuarioLogueado["id"] != $_GET["idUser"]) {
		header("location:index.php");exit;
	}
?>
<html>
<head>
	<title>Perfil</title>
</head>
<body>
	<?php include("header.php"); ?>
	<?php if (is_null($usuarioAVer)) { ?>
		El usuario no existe
	<?php } else { ?>
		FALTA EL FORMULARIO
	<?php } ?>
	<?php if (!empty($files)) { ?>
		<img src="<?php echo $files[0] ?>"/>
	<?php } ?>
</body>
</html>