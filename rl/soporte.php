<?php

require_once("rl/clases/jsonRepository.php");
require_once("rl/clases/auth.php");
require_once("rl/clases/validar.php");
require_once("rl/clases/usuario.php");

$tipoRepositorio = "json";
$repositorio = null;

if ($tipoRepositorio == "json")
{
	$repositorio = new JSONRepository();
}

$auth = Auth::getInstance($repositorio->getUserRepository());
$validar = Validar::getInstance($repositorio->getUserRepository());
