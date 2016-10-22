
<?php
	require_once("soporte.php");

	$nombre = "";

	if ($auth->estaLogueado())
	{
		$user = $auth->getUsuarioLogueado();

		$nombre = $user->getNombre();
	}
?>
<html>
<head>
	<title>Mi Home</title>
</head>
<body>
	<h1>Bienvenido <?php echo $nombre ?></h1>
	<ul>
		<?php if (!$auth->estaLogueado()) { ?>
			<li>
				<a href="register.php">Registrate</a>
			</li>
			<li>
				<a href="login.php">Log In</a>
			</li>
		<?php } else { ?>
			<li>
				<a href="logout.php">Log Out</a>
			</li>
		<?php } ?>
	</ul>
</body>
</html>
