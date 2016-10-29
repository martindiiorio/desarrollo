<?php

require_once("rl/clases/jsonRepository.php");
require_once("rl/clases/auth.php");
require_once("rl/clases/validar.php");
require_once("rl/clases/createUserTable.php")
require_once("rl/clases/usuario.php");

$tipoRepositorio = "sql";
$repositorio = null;

if ($tipoRepositorio == "json") {
	$repositorio = new JSONRepository();
}
if ($tipoRepositorio == "sql") {
	$repositorio = new SQLRepository();
}

$auth = Auth::getInstance($repositorio->getUserRepository());
$validar = Validar::getInstance($repositorio->getUserRepository());

// $repositorio->setConnection();
// $repositorio->createTable();
