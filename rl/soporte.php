<?php

require_once("rl/clases/sqlRepository.php");
require_once("rl/clases/auth.php");
require_once("rl/clases/validar.php");
require_once("rl/clases/table.php");
require_once("rl/clases/usuario.php");

$repositorio = new SQLRepository();

$auth = Auth::getInstance($repositorio->getUserRepository());
$validar = Validar::getInstance($repositorio->getUserRepository());
$table = Table::getInstance($repositorio->getUserRepository());
