<?php

require_once("rl/clases/userRepository.php");
require_once("rl/clases/usuario.php");

class UserSQLRepository extends UserRepository {
  private $dbsn;
  private $db_user;
  private $db_pass;

  public function existeElMail($mail) {}

	// public function existeElMail($mail)
	// {
	// 	$usuariosArray = $this->getAllUsers();
  //
	// 	foreach ($usuariosArray as $key => $usuario) {
  //
	// 		if ($mail == $usuario->getMail())
	// 		{
	// 			return true;
	// 		}
	// 	}
  //
	// 	return false;
	// }

  public function setConnection() { //ver si se puede abstraer a userRepository como una funciona publica para quien hereda
    $dbsn = 'mysql:host=localhost;dbname=dondeDuele;charset=utf8mb4;port:3306';
    $db_user = 'root';
    $db_pass = 'root';

    try {
        $db = new PDO($dbsn, $db_user, $db_pass);
    }
        catch (PDOException $Exception) {
            return false;
            //return $Exception->getMessage();
        }
    return $db;
  }

  public function objectToArray($usuario) {
    $result = Array();

    $nombre = $usuario->getNombre();
    $mail = $usuario->getMail();
    $password = $usuario->getPassword();

    $result[] = $nombre;
    $result[] = $mail;
    $result[] = $password;

    return $result;
  }

  public function guardarUsuario(Usuario $miUsuario) {
    $connection = $this->setConnection();
    if ($connection) {

      $newUser = $this->objectToArray($miUsuario);

      try {
        $stmt = $this->setQuery($newUser);
        $query = $connection->prepare($stmt);
        $query->execute();
        $query = null;
      }
        catch (PDOException $Exception) {
          echo $Exception->getMessage();
        }
    }

  }

  // private function getConnection() {
  //   $this->setDatabaseData();
  //   try {
  //       $this->db = new PDO($this->dbsn, $this->db_user, $this->db_pass);
  //   }
  //       catch (PDOException $Exception) {
  //           return $Exception->getMessage();
  //       }
  //   return true;
  // }

  private function setQuery($user) {
      $stmt = "insert into user(nombre, email, password) VALUES ('$user[0]', '$user[1]', '$user[2]')";
      return $stmt;
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

	// public function getAllUsers() {
  //   $users = $this->setConnection();
  //   $users->query("select user.id from user");
  //   $results = $users->fetchAll(PDO::FETCH_ASSOC);
  //   return $results;
	// }

  public function createTable() {
      $stmt = "CREATE TABLE user (
        id      			INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        nombre  			VARCHAR(63) NOT NULL,
        email  			VARCHAR(63) NOT NULL,
        password  			VARCHAR(255) NOT NULL
        )";
      $db = $this->setConnection();
      $query = $db->prepare($stmt);
      $query->execute();
      $query = null;
  }
}


//
// if ($_POST && $_POST["origen"] === "register") {
//     $titulo = $_POST['titulo'];
//     $rating = $_POST['rating'];
//     $premios = $_POST['premios'];
//     $duracion = $_POST['duracion'];
//     $genero = $_POST['genero'];
//
// }
?>
