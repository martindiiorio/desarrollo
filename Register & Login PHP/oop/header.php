<?php 
	require_once("soporte.php");
?>
<header style="background-color:yellow">
	<a href="index.php">Home</a>
	<div style="display:inline;float:right;">
		<?php if ($auth->estaLogueado()) { 
			include("headerLogueado.php");
		} else {
			include("headerNoLogueado.php");
		}?>
	</div>
</header>