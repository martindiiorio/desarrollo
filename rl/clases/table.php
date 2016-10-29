<?php

require_once("rl/clases/userRepository.php");

class Table {

  private $userRepository;

	private static $instance = null;

	public static function getInstance(UserRepository $userRepository) {
        if (Table::$instance === null) {
            Table::$instance = new Table();
            Table::$instance->setUserRepository($userRepository);
            $connection = $userRepository->setConnection();
            if ($connection) {
              $userRepository->createTable();
            }
        }

        return Table::$instance;
    }

  private function setUserRepository(UserRepository $userRepository) {
    $this->userRepository = $userRepository;
  }

	private function __construct() {

	}
}
