<?php

require_once("rl/clases/repository.php");
require_once("rl/clases/userJsonRepository.php");

class JSONRepository extends Repository {
	private $userRepository;

	public function getUserRepository()
	{
		if ($this->userRepository == null)
		{
			$this->userRepository = new UserJSONRepository();
		}

		return $this->userRepository;
	}
}
