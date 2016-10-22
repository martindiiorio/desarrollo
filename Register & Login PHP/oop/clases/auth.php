<?php

require_once("userRepository.php");

class Auth {

    private $userRepository;

	private static $instance = null;

	public static function getInstance(UserRepository $userRepository)
    {
        if (Auth::$instance === null) {
            session_start();
            Auth::$instance = new Auth();
            Auth::$instance->setUserRepository($userRepository);
            Auth::$instance->checkLogin();
        }

        return Auth::$instance;
    }

    private function setUserRepository(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

	private function __construct() {

	}

    public function checkLogin()
    {
        if (!isset($_SESSION["usuarioLogueado"]))
        {
            //Me tengo que fijar si hay cookie!
            if (isset($_COOKIE["usuarioLogueado"])) {
                $idUsuario = $_COOKIE["usuarioLogueado"];

                $usuario = $this->userRepository->getUsuarioById($idUsuario);

                $this->loguear($usuario);
            }
        }
    }

    public function loguear($usuario)
    {
        $_SESSION["usuarioLogueado"] = $usuario;
    }

    public function logout()
    {
        session_destroy();
        $this->unsetCookie("usuarioLogueado");
    }

    private function unsetCookie($cookie)
    {
        setcookie($cookie, "", -1);
    }

    public function estaLogueado()
    {
        return isset($_SESSION["usuarioLogueado"]);
    }

    public function getUsuarioLogueado() {
        return $_SESSION["usuarioLogueado"];
    }
}
