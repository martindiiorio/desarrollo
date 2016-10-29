<?php

require_once("rl/clases/usuario.php");

abstract class UserRepository {

	abstract public function existeElMail($mail);

	abstract public function guardarUsuario(Usuario $miUsuario);

	abstract public function setConnection();

	abstract public function createTable();

}
