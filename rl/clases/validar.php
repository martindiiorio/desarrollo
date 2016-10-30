<?php

require_once("rl/clases/userRepository.php");

class Validar {
  private $userRepository;
	private static $instance = null;

	public static function getInstance(UserRepository $userRepository) {
        if (Validar::$instance === null) {
            Validar::$instance = new Validar();
            Validar::$instance->setUserRepository($userRepository);
        }
        return Validar::$instance;
    }

    private function setUserRepository(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

	private function __construct() {}

    public function validarUsuario($miUsuario) {
        $errores = Array();

        if (trim($miUsuario["nombre"]) == "") {
            $errores[] = "Falta el nombre";
        }
        if (trim($miUsuario["password"]) == "") {
            $errores[] = "Falta la pass";
        }
        if (trim($miUsuario["cpass"]) == "") {
            $errores[] = "Falta el cpass";
        }
        if ($miUsuario["password"] != $miUsuario["cpass"]) {
            $errores[] = "Pass y pass2 son distintas";
        }
        if ($miUsuario["email"] == "") {
            $errores[] = "Falta el mail";
        }
        if (!filter_var($miUsuario["email"], FILTER_VALIDATE_EMAIL)) {
            $errores[] = "El mail tiene forma fea";
        }
        if ($this->userRepository->existeElMail($miUsuario["email"])) {
            $errores[] = "Usuario ya registrado";
        }
        return $errores;
    }

    function validarLogin() {
        $errores = Array();
        $results = $this->userRepository->existeElMail($_POST["usrnameLogin"]);
        if (trim($_POST["usrnameLogin"]) == "") {
          $errores[] = "No pusiste email";
        }
        if (trim($_POST["pswLogin"]) == "") {
          $errores[] = "No pusiste contrase&ntilde;a";
        }
        if (!$results[0]["email"] || !$this->userRepository->usuarioValido($results[0]["password"], $_POST["pswLogin"])) {
          $errores[] = "La combinación de usuario y contrase&ntilde;a no es válida";
        }

        return $errores;
    }
}
