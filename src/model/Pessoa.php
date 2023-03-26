<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pessoa")
 */

class Pessoa {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	private $id;

	/**
	 * @ORM\Column(type="string")
	 */
	private $nome;

	/**
	 * @ORM\Column(type="string")
	 */
	private $cpf;

	public function getId() {
		return $this->id;
	}
	public function getNome() {
		return $this->nome;
	}
	public function getCpf() {
		return $this->cpf;
	}

	public function setId($id) {
		$this->id = $id;
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}
}
