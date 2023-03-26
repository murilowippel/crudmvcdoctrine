<?php

class ContatoController {

	//Método que abre a consulta de contatos
	public static function consultaContato() {
		global $entityManager;

		$contatoRep = $entityManager->getRepository('Contato');
		$arrContato = $contatoRep->findAll();
		require_once 'view/contato/consulta.php';
	}

	//Método que abre o formulário de contato para inserir um novo registro
	public static function newContato() {
		global $entityManager;

		//Criando objeto em branco
		$contato = new Contato();

		//Carregando lista de pessoas
		$pessoaRep = $entityManager->getRepository('Pessoa');
		$arrPessoa = $pessoaRep->findAll();

		require_once 'view/contato/cadastro.php';
	}

	//Método que abre o formulário de contato para editar um registro existente
	public static function editContato($id) {
		global $entityManager;

		//carregar contato pelo $id
		$contato = $entityManager->find('Contato', $id);

		//Carregando lista de pessoas
		$pessoaRep = $entityManager->getRepository('Pessoa');
		$arrPessoa = $pessoaRep->findAll();

		require_once 'view/contato/cadastro.php';
	}

	//Método que insere ou atualiza um registro de contato no banco
	public static function saveContato($data) {
		global $entityManager;

		$pessoa = $entityManager->find('Pessoa', $data["idpessoa"]);

		//Verificando se está inserindo ou editando um registro
		if ($data["id"] == "") {

			$contato = new Contato();
			$contato->setTipo($data["tipo"]);
			$contato->setDescricao($data["descricao"]);
			$contato->setPessoa($pessoa);

			$entityManager->persist($contato);
			$entityManager->flush();

			$msg = "Registro inserido com sucesso!";
		} else {
			//carregar contato pelo $id
			$contato = $entityManager->find('Contato', $data["id"]);
			$contato->setTipo($data["tipo"]);
			$contato->setDescricao($data["descricao"]);
			$contato->setPessoa($pessoa);

			$entityManager->flush();

			$msg = "Registro alterado com sucesso!";
		}

		ContatoController::newContato();
	}

	//Método que exclui um contato
	public static function deleteContato($id) {
		global $entityManager;

		//deletar contato pelo $id
		$contato = $entityManager->find('Contato', $id);
		$entityManager->remove($contato);
		$entityManager->flush();

		ContatoController::consultaContato();
	}
}
