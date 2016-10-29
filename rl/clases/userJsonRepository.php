<?php

require_once("rl/clases/userRepository.php");
require_once("rl/clases/usuario.php");

class UserJSONRepository extends UserRepository {
	public function setConnection() {}

	public function createTable() {}

	public function existeElMail($mail)
	{
		$usuariosArray = $this->getAllUsers();

		foreach ($usuariosArray as $key => $usuario) {

			if ($mail == $usuario->getMail())
			{
				return true;
			}
		}

		return false;
	}

	public function guardarUsuario(Usuario $miUsuario)
	{
		if ($miUsuario->getId() == null)
		{
			$miUsuario->setId($this->traerNuevoId());
		}

		$miUsuarioArray = $this->usuarioToArray($miUsuario);
		$usuarioJSON = json_encode($miUsuarioArray);
		file_put_contents("rl/usuarios.json", $usuarioJSON . PHP_EOL, FILE_APPEND);
	}


	private function usuarioToArray(Usuario $miUsuario) {
		$usuarioArray = Array();

		$usuarioArray["nombre"] = $miUsuario->getNombre();
		$usuarioArray["password"] = $miUsuario->getPassword();
		$usuarioArray["mail"] = $miUsuario->getMail();
		$usuarioArray["id"] = $miUsuario->getId();


		return $usuarioArray;
	}

	private function arrayToUsuario(Array $miUsuario) {
		return new Usuario($miUsuario);
	}

	private function traerNuevoId()
	{
		if (!file_exists("rl/usuarios.json"))
		{
			return 1;
		}

		$usuarios = file_get_contents("rl/usuarios.json");

		$usuariosArray = explode(PHP_EOL, $usuarios);
		@$ultimoUsuario = $usuariosArray[count($usuariosArray) - 2 ];
		$ultimoUsuarioArray = json_decode($ultimoUsuario, true);

		return $ultimoUsuarioArray["id"] + 1;
	}

	public function usuarioValido($mail, $pass)
	{
		$usuario = $this->getUsuarioByMail($mail);

		if ($usuario) {
			if (password_verify($pass, $usuario->getPassword())) {
				return true;
			}
		}

		return false;
	}

	public function getUsuarioByMail($mail)
	{
		$usuariosArray = $this->getAllUsers();

		foreach ($usuariosArray as $key => $usuario) {

			if ($mail == $usuario->getMail())
			{
				return $usuario;
			}
		}

		return null;
	}

	public function getUsuarioById($id)
	{
		$usuariosArray = $this->getAllUsers();

		foreach ($usuariosArray as $key => $usuario) {

			if ($id == $usuario->getId())
			{
				return $usuario;
			}
		}

		return null;
	}

	public function getAllUsers()
	{
		$usuarios = file_get_contents("rl/usuarios.json");

		$usuariosArray = explode(PHP_EOL, $usuarios);

		array_pop($usuariosArray);

		return $this->muchosArraysAMuchosUsuarios($usuariosArray);
	}

	private function muchosArraysAMuchosUsuarios(Array $usuariosArray)
	{
		$usuarios = Array();

		foreach ($usuariosArray as $usuarioArray) {
			$usuarios[] = $this->arrayToUsuario(json_decode($usuarioArray,1));
		}

		return $usuarios;
	}

}
