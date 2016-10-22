<?php

require_once("repository.php");
require_once("userJsonRepository.php");

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