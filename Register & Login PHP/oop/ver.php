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
	$usuarioAVer = $repositorio->getUserRepository()->getUsuarioById($_GET["idUser"]);
	$files = glob("img/" . $usuarioAVer["id"] . ".{png,jpg,jpeg,gif,bmp,svg}", GLOB_BRACE);
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
		<ul>
				<li>
					Nombre: <?php echo $usuarioAVer->getNombre(); ?>
				</li>
				<li>
					Apellido: <?php echo $usuarioAVer->getApellido(); ?>
				</li>
				<li>
					Mail: <?php echo $usuarioAVer->getMail(); ?>
				</li>
				<li>
					Sexo: <?php echo $usuarioAVer->getSexo(); ?>
				</li>
		</ul>
	<?php } ?>
	<?php if (!empty($files)) { ?>
		<img src="<?php echo $files[0] ?>"/>
	<?php } ?>
</body>
</html>