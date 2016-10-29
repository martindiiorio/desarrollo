<?php

require_once("rl/clases/userRepository.php");
require_once("rl/clases/usuario.php");

class UserSQLRepository extends UserRepository {
  private $db;
  private $dbsn;
  private $db_user;
  private $db_pass;
  private $query;

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

  public function guardarUsuario(Usuario $miUsuario) {
    $miUsuarioArray = $this->usuarioToArray($miUsuario);

    $connection = $this->getConnection();

    if (!$connection) {
      echo $connection;
    }

    try {
      $this->query = $this->prepareSaveQuery();
      $this->query->execute();
    }
      catch (PDOException $Exception) {
        echo $Exception->getMessage();
      }

  }

  private function setDatabaseData() {
    $this->dbsn = 'mysql:host=localhost;dbname=dondeDuele;charset=utf8mb4;port:3306';
    $this->db_user = 'root';
    $this->db_pass = '123456';
  }

  private function getConnection() {
    $this->setDatabaseData();
    try {
        $this->db = new PDO($this->dbsn, $this->db_user, $this->db_pass);
    }
        catch (PDOException $Exception) {
            return $Exception->getMessage();
        }
    return true;
  }

  private function prepareSaveQuery() {
      $stmt = "insert into paciente(nombre, email, password) values ('$nombre', '$email', '$password')";
      $this->query = $this->db->prepare($stmt);
  }

  p

	private function usuarioToArray(Usuario $miUsuario) {
		$usuarioArray = [];

		$usuarioArray["nombre"] = $miUsuario->getNombre();
		$usuarioArray["password"] = $miUsuario->getPassword();
		$usuarioArray["mail"] = $miUsuario->getMail();
		$usuarioArray["id"] = $miUsuario->getId();


		return $usuarioArray;
	}

	private function arrayToUsuario(Array $miUsuario) {
		return new Usuario($miUsuario);
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

	public function getAllUsers() {
    $users = $db->query("select paciente.id from paciente");
    $results = $users->fetchAll(PDO::FETCH_ASSOC);
    return $results;
	}
}




if ($_POST && $_POST["origen"] === "register") {
    $titulo = $_POST['titulo'];
    $rating = $_POST['rating'];
    $premios = $_POST['premios'];
    $duracion = $_POST['duracion'];
    $genero = $_POST['genero'];

}

?>
