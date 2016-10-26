<?php

require_once("rl/clases/userRepository.php");

class Validar {

    private $userRepository;
	private static $instance = null;

	public static function getInstance(UserRepository $userRepository)
    {
        if (Validar::$instance === null) {
            Validar::$instance = new Validar();
            Validar::$instance->setUserRepository($userRepository);
        }

        return Validar::$instance;
    }

    private function setUserRepository(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

	private function __construct() {

	}

    public function validarUsuario($miUsuario)
    {
        $errores = [];

        if (trim($miUsuario["nombre"]) == "")
        {
            $errores[] = "Falta el nombre";
        }
        if (trim($miUsuario["password"]) == "")
        {
            $errores[] = "Falta la pass";
        }
        if (trim($miUsuario["cpass"]) == "")
        {
            $errores[] = "Falta el cpass";
        }
        if ($miUsuario["password"] != $miUsuario["cpass"])
        {
            $errores[] = "Pass y pass2 son distintas";
        }
        if ($miUsuario["mail"] == "")
        {
            $errores[] = "Falta el mail";
        }
        if (!filter_var($miUsuario["mail"], FILTER_VALIDATE_EMAIL))
        {
            $errores[] = "El mail tiene forma fea";
        }
        if ($this->userRepository->existeElMail($miUsuario["mail"]))
        {
            $errores[] = "Usuario ya registrado";
        }
        return $errores;
    }

    function validarLogin()
    {
        $errores = [];

        if (trim($_POST["usrnameLogin"]) == "") {
            $errores[] = "No pusiste email";
        } else if (!$this->userRepository->existeElMail($_POST["usrnameLogin"])) {
            $errores[] = "El mail no existe";
        } else if (!$this->userRepository->usuarioValido($_POST["usrnameLogin"], $_POST["pswLogin"])) {
            $errores [] = "El usuario no es valido";
        }
        if (trim($_POST["pswLogin"]) == "") {
            $errores[] = "No pusiste contrase&ntilde;a";
        }

        return $errores;
    }
}
