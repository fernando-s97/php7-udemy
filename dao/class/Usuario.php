<?php

/**
 * 
 */
class Usuario {
	private $id;
	private $login;
	private $senha;
	private $dataCadastro;

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

	public function __toString() {
		return json_encode(array(
			'id' => $this->getId(),
			'login' => $this->getLogin(),
			'senha' => $this->getSenha(),
			'dataCadastro' => $this->getDataCadastro()->format('d/m/Y I:i:s')
		));
	}
}

?>