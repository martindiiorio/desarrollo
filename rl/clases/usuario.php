<?php

class Usuario {

	public $id;
	public $nombre;
	public $password;
	public $mail;

	public function __construct(Array $miUsuario)
	{
		$this->nombre = $miUsuario["nombre"];
		$this->password = $miUsuario["password"];
		$this->mail = $miUsuario["email"];
	}

	public function getNombre() {
		return $this->nombre;
	}
	public function getId() {
		return $this->id;
	}
	public function getMail() {
		return $this->mail;
	}
	public function getPassword() {
		return $this->password;
	}
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	public function setMail($mail)
	{
		$this->mail = $mail;
	}
	public function setPassword($password)
	{
		$this->password = password_hash($password, PASSWORD_DEFAULT);
	}
	public function setId($id)
	{
		$this->id = $id;
	}

	// public function guardarImagen()
	// {
	// 	if ($_FILES["imagen"]["error"] == UPLOAD_ERR_OK)
	// 	{
	// 		// No hubo errores :)
	// 		$path = $_FILES['imagen']['name'];
	// 		$ext = pathinfo($path, PATHINFO_EXTENSION);
	//
	// 		$miArchivo = dirname(__FILE__);
	// 		$miArchivo = $miArchivo . "/img/";
	// 		$miArchivo = $miArchivo . $this->getId() . "." . $ext;
	//
	// 		move_uploaded_file($_FILES["imagen"]["tmp_name"], $miArchivo);
	// 	}
	// }
}
