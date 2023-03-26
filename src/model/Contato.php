<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contato")
 */
class Contato {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	private $id;

	/**
	 * @ORM\Column(type="integer")
	 */
	private $tipo;

	/**
	 * @ORM\Column(type="string")
	 */
	private $descricao;

	/**
	 * @ORM\ManyToOne(targetEntity="Pessoa", inversedBy="pessoa")
	 * @ORM\JoinColumn(name="idpessoa", referencedColumnName="id")
	 */
	private $pessoa;

	/**
	 * Get the value of id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */
	public function setId($id) {
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the value of tipo
	 */
	public function getTipo() {
		return $this->tipo;
	}

	/**
	 * Set the value of tipo
	 *
	 * @return  self
	 */
	public function setTipo($tipo) {
		$this->tipo = $tipo;

		return $this;
	}

	/**
	 * Get the value of descricao
	 */
	public function getDescricao() {
		return $this->descricao;
	}

	/**
	 * Set the value of descricao
	 *
	 * @return  self
	 */
	public function setDescricao($descricao) {
		$this->descricao = $descricao;

		return $this;
	}

	/**
	 * Get the value of pessoa
	 */
	public function getPessoa() {
		return $this->pessoa;
	}

	/**
	 * Set the value of pessoa
	 *
	 * @return  self
	 */
	public function setPessoa($pessoa) {
		$this->pessoa = $pessoa;

		return $this;
	}
}
