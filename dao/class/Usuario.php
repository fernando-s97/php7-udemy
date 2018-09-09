<?php

/**
 * 
 */
class Usuario {
	private $id;
	private $login;
	private $senha;
	private $dataCadastro;

	public function __toString() {
		return json_encode(array(
			'id' => $this->getId(),
			'login' => $this->getLogin(),
			'senha' => $this->getSenha(),
			'dataCadastro' => $this->getDataCadastro()->format('d/m/Y I:i:s')
		));
	}

	public static function getUsers() {
		$sql = new Sql();
		return $sql->select('SELECT * FROM tb_usuario ORDER BY login');
	}

	public static function searchByLogin($login) {
		$sql = new Sql();
		return $sql->select('SELECT * FROM tb_usuario WHERE login LIKE :LOGIN ORDER BY login', array(
			':LOGIN' => '%'.$login.'%'
		));
	}

	public function loadById($id) {
		$sql = new Sql();
		$results = $sql->select('SELECT * FROM tb_usuario WHERE id = :ID', array(
			':ID' => $id
		));

		if (count($results) > 0) {
			$row = $results[0];

			$this->setId($row['id']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
			$this->setDataCadastro(new DateTime($row['dataCadastro']));
		}
	}

	public function login($login, $password) {
		$sql = new Sql();
		$results = $sql->select('SELECT * FROM tb_usuario WHERE login = :LOGIN AND senha = :PASSWORD', array(
			':LOGIN' => $login,
			':PASSWORD' => $password
		));

		if (count($results) <= 0) throw new Exception("Login e/ou senha inválidos.");

		$row = $results[0];

		$this->setId($row['id']);
		$this->setLogin($row['login']);
		$this->setSenha($row['senha']);
		$this->setDataCadastro(new DateTime($row['dataCadastro']));
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getLogin() {
		return $this->login;
	}

	public function setLogin($login) {
		$this->login = $login;
	}

	public function getSenha() {
		return $this->senha;
	}

	public function setSenha($senha) {
		$this->senha = $senha;
	}

	public function getDataCadastro() {
		return $this->dataCadastro;
	}

	public function setDataCadastro($dataCadastro) {
		$this->dataCadastro = $dataCadastro;
	}
}

?>