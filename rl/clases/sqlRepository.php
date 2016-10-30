<?php

require_once("rl/clases/repository.php");
require_once("rl/clases/UserSQLRepository.php");

class SQLRepository extends Repository {
	private $userRepository;

	public function getUserRepository() {
		if ($this->userRepository == null) {
			$this->userRepository = new UserSQLRepository();
		}
		return $this->userRepository;
	}
}
