<?php

require_once("rl/clases/userRepository.php");
require_once("rl/clases/usuario.php");

class UserSQLRepository extends UserRepository {
	public function existeElMail($mail) {
    $stmt = "select user.email, user.password from user where user.email = " . "'" . $mail . "';";
    $query = $this->connectAndPrepare($stmt);
    $result = Array();
    try {
      $query->execute();
    } catch (PDOException $Exception) {
      echo "Hubo un error. Intente nuevamente";
      return false;
    }
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    if (@!$result[0]["email"] && @$result[0]["email"] !== $mail) {
      return false;
    }
    return $result;
	}

  public function connectAndPrepare($stmt) {
    $db = $this->setConnection();
    $query = $db->prepare($stmt);
    return $query;
  }

  public function usuarioValido($pwDB, $pwUser) {
    if (password_verify($pwUser, $pwDB)) {
      return true;
    }
    return false;
  }

  public function setConnection() { //ver si se puede abstraer a userRepository como una funciona publica para quien hereda
    $dbsn = 'mysql:host=localhost;dbname=dondeduele;charset=utf8mb4;port:3306';
    $db_user = 'root';
    $db_pass = '';

    try {
        $db = new PDO($dbsn, $db_user, $db_pass);
    }
        catch (PDOException $Exception) {
            return false;
            //return $Exception->getMessage();
        }
    return $db;
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
      } catch (PDOException $Exception) {
          echo $Exception->getMessage();
        }
    }
  }

  private function setQuery($user) {
      $stmt = "insert into user(nombre, email, password) VALUES ('$user[0]', '$user[1]', '$user[2]')";
      return $stmt;
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

	private function arrayToUsuario(Array $miUsuario) {
		return new Usuario($miUsuario);
	}

  public function getUsuarioByMail($mail) {
    $stmt = "select user.nombre, user.email, user.password from user where user.email = " . "'" . $mail . "';";
    $query = $this->connectAndPrepare($stmt);
    $usuario = Array();
    try {
      $query->execute();
    } catch (PDOException $Exception) {
      echo "Hubo un error. Intente nuevamente";
      return false;
    }
    $usuario = $query->fetchAll(PDO::FETCH_ASSOC);
    $usuario = $this->arrayToUsuario($usuario[0]);
    return $usuario;
  }

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

?>
