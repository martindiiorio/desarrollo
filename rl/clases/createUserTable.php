<?php
require_once("rl/clases/userRepository.php");

class createUserTable extends userRepository {
  public function setConnection() {//ver si se puede abstraer a userRepository como una funciona publica para quien hereda
    $dbsn = 'mysql:host=localhost;dbname=dondeDuele;charset=utf8mb4;port:3306';
    $db_user = 'root';
    $db_pass = '';

    try {
        $db = new PDO($dbsn, $db_user, $db_pass);
    }
        catch (PDOException $Exception) {
            return false;
            echo $Exception->getMessage();
        }
    return $db;
  }

  public function createTable() {
    $db = $this->setConnection();

    if ($db) {
      $stmt = "CREATE TABLE user (
        id      			INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        nombre  			VARCHAR(63) NOT NULL,
        email  			VARCHAR(63) NOT NULL,
        password  			VARCHAR(63) NOT NULL
        )";
      $query = $db->prepare($stmt);
      $query->execute();
    }
  }

  public function existeElMail($mail) {}

  public function guardarUsuario(Usuario $miUsuario) {}
}


?>
